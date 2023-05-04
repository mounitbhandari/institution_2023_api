<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use App\Http\Resources\TransactionMasterReceivedResource;
use App\Http\Resources\TransactionMasterSpecialResource;
use App\Models\CustomVoucher;
use App\Models\Ledger;
use App\Models\StudentCourseRegistration;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;
class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(StoreOrganisationRequest $request)
    {
        //
    } */
      // Developer
      public function delete_student_to_course_by_register_id($id){
        DB::beginTransaction();
        try{

            $tran_studentToCourse= StudentCourseRegistration::find($id);
            if(!empty($tran_studentToCourse)){
                //1 delete all received fees from transaction_details  where reference_transaction_master_id;
                $student_course_registration=DB::select("delete from transaction_details where transaction_master_id in (select id from transaction_masters where reference_transaction_master_id in(
                    select id from transaction_masters where transaction_masters.student_course_registration_id='$id'))");
                
                //2 delete all received fees from transaction_master  where reference_transaction_master_id;
                $transaction_masters_registration=DB::select("delete from transaction_masters where reference_transaction_master_id in(
                    select id from transaction_masters where transaction_masters.student_course_registration_id='$id')");

                //3 delete all fees charged from transaction_details  where reference_transaction_master_id;
                    $transaction_details=DB::select("delete from transaction_details where transaction_master_id in (
                    select id from transaction_masters where transaction_masters.student_course_registration_id='$id')");

                //4 delete all fees charged from transaction_master  where transaction_master_id;
                $tran_master=TransactionMaster::where('student_course_registration_id',$id)->delete();
               
                //5 delete StudentCourseRegistration from student_course_registrations  where id;
                $tran_studentToCourse=StudentCourseRegistration::where('id',$id)->delete();
               
            }
           
            
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=> 'Deleted Successfully'], 200,[],JSON_NUMERIC_CHECK);
      }
      public function delete_transaction($id){
        DB::beginTransaction();
        try{
            $transactionMaster= TransactionMaster::find($id);
            if(!empty($transactionMaster)){
                $tran_details=TransactionDetail::where('transaction_master_id',$id)->delete();
                //$tran_details=DB::select("delete from transaction_details where transaction_master_id='$id'");

                $tran_master=TransactionMaster::where('id',$id)->delete();
               // $tran_master=DB::select("delete from transaction_masters where id='$id'");
               
            }
        DB::commit();  
        }catch(\Exception $e){
           DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
        

        return response()->json(['success'=>1,'data'=> 'Deleted Successfully'], 200,[],JSON_NUMERIC_CHECK);
      }

      public function delete_transaction_details($id){
        DB::beginTransaction();
        try{
             // ------ delete record ---------
            $tran_details=TransactionDetail::where('id',$id)->delete();
            if(!$tran_details){
                return response()->json(['success'=>0,'data'=>'Sorry Data Not Deleted:'.$id], 200,[],JSON_NUMERIC_CHECK);
            }
           
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=> 'Deleted Successfully'], 200,[],JSON_NUMERIC_CHECK);
      }
      public function get_count_organisation(){
        $result = DB::select("select count(*) as totalOrganisation from organisations where inforce=1");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function count_total_student()
    {
        $result = DB::select("select count(*) as total_student from ledgers where is_student=1 and inforce=1");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function all_org_total_income()
    {
        $result = DB::select("select get_curr_year_total_cash_developer() as total_cash_year, 
        get_curr_year_total_bank_developer() as total_bank_year,
        get_curr_year_total_cash_developer()+get_curr_year_total_bank_developer() as total_income");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function all_org_detail_info()
    {
        $result = DB::select("select ledgers.organisation_id,
        organisations.organisation_name,
        organisations.whatsapp_number,
        organisations.email_id,
        count(*) as total_student ,
        get_curr_year_total_cash(ledgers.organisation_id)+get_curr_year_total_bank(ledgers.organisation_id) as total_yearly_income
        from ledgers
        inner join organisations ON organisations.id = ledgers.organisation_id
        group by organisation_id,organisations.organisation_name,organisations.whatsapp_number,organisations.email_id");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_all_feeCharge_developer()
    {
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('organisations', 'organisations.id', '=', 'transaction_masters.organisation_id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_details.transaction_type_id', '=', 2)
        ->select('student_course_registration_id','organisations.organisation_name',
          DB::raw('sum(transaction_details.amount) as fees_total')
        )
        -> groupBy('transaction_masters.student_course_registration_id','organisations.organisation_name')
        ->get();
        foreach ($result as $row) {
            $row->setAttribute('fees_details', $this->get_fees_charge_details_by_id($row->student_course_registration_id));
        }
        //return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
       return response()->json(['success'=>1,'data'=> FeesChargedResource::collection($result)], 200,[],JSON_NUMERIC_CHECK);

    }
    public function get_fees_charge_details_by_id($id){
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
        ->where('student_course_registration_id', '=', $id)
        ->where('transaction_details.transaction_type_id', '=',2)
        ->select('student_course_registration_id'
        ,'transaction_masters.id'
        ,'transaction_masters.transaction_date'
        ,'transaction_masters.transaction_number'
        ,'ledgers.ledger_name'
        ,'transaction_details.amount')
        ->get();
        return $result;
    }
    //-----------------------------------------------
    public function get_all_feeReceived_developer()
    {
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('organisations', 'organisations.id', '=', 'transaction_masters.organisation_id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_details.transaction_type_id', '=', 2)
        ->where(DB::raw('get_total_received_by_studentregistration(transaction_masters.student_course_registration_id)- get_total_discount_by_studentregistration_id(transaction_masters.student_course_registration_id)'),'>',0)
        ->select('student_course_registration_id'
        ,'ledgers.ledger_name'
        ,'courses.full_name','organisations.organisation_name'
        , DB::raw('get_total_received_by_studentregistration(transaction_masters.student_course_registration_id)- get_total_discount_by_studentregistration_id(transaction_masters.student_course_registration_id)
        as total_received')
        )->orderBy('student_course_registration_id', 'DESC')->distinct()->get();
        foreach ($result as $row) {
            $row->setAttribute('fees_received_details', $this->get_fees_received_details_by_id($row->student_course_registration_id));
        }  
     
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);

    }
    public function get_fees_received_details_by_id($id){
                 
        $result = DB::select("select trans_master2.student_course_registration_id, 
        trans_master1.id,
        trans_master1.reference_transaction_master_id,
        table1.transaction_number,
        table1.transaction_date, 
        trans_master1.comment,
        table1.ledger_id,
        table1.ledger_name, 
        table1.temp_total_received
        from transaction_masters trans_master1,transaction_masters trans_master2
        inner join (select transaction_masters.id,
                          transaction_masters.transaction_number,
                          transaction_masters.transaction_date,
                          transaction_details.ledger_id,
                          ledgers.ledger_name,
                          transaction_details.amount as temp_total_received from transaction_masters
                          inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                          inner join ledgers ON ledgers.id = transaction_details.ledger_id
                          where transaction_masters.voucher_type_id=4
                          and transaction_details.transaction_type_id=1) as table1
        where trans_master1.reference_transaction_master_id=trans_master2.id
        and table1.id = trans_master1.id
        and trans_master2.student_course_registration_id='$id'
        order by trans_master1.created_at desc");
       return $result;
    }
    public function organisation_Store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'organisationName' => 'required|max:255|unique:organisations,organisation_name',
            'emailId' => "required|max:255",
            'address' => "required|max:255",     
        ]);
        DB::beginTransaction();

       try{
         

           // if any record is failed then whole entry will be rolled back
           //try portion execute the commands and catch execute when error.
            $organisation= new Organisation();
           
            $organisation ->organisation_name = $request->input('organisationName');
            $organisation ->address = $request->input('address');
            $organisation->state_id = $request->input('stateId');
            $organisation->city = $request->input('city');
            $organisation->district= $request->input('district');
            $organisation->pin= $request->input('pin');
            $organisation->contact_number= $request->input('contactNumber');
            $organisation->whatsapp_number= $request->input('whatsappNumber');
            $organisation->email_id= $request->input('emailId');
            $organisation->opening_balance= $request->input('openingBalance');
           
            $organisation->save();
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
          return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
            //return $this->errorResponse($e->getMessage());
        }
        return response()->json(['success'=>1,'data'=>$organisation], 200,[],JSON_NUMERIC_CHECK);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function get_all_organisation_list()
    {
        $result = DB::select("Select organisations.id,
        organisations.state_id as state_id,
        organisation_name,
        address,
        city,
        district,
        pin,
        whatsapp_number,
        contact_number,
        email_id,
        states.state_name,
        opening_balance
        from organisations
        inner join states on organisations.id = states.id
        order by organisations.id desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_organisation_by_id($id)
    {
        $result = DB::select("Select id,
        organisation_name,
        address,
        city,
        district,
        pin,
        whatsapp_number,
        contact_number,
        email_id,
        opening_balance
        from organisations
        where id='$id'");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
   
    public function organisation_update(Request $request)
    {     
        $organisation = Organisation::findOrFail($request->input('organisationId'));
        $organisation ->organisation_name = $request->input('organisationName');
        $organisation ->address = $request->input('address');
        $organisation->state_id = $request->input('stateId');
        $organisation->city = $request->input('city');
        $organisation->district= $request->input('district');
        $organisation->pin= $request->input('pin');
        $organisation->contact_number= $request->input('contactNumber');
        $organisation->whatsapp_number= $request->input('whatsappNumber');
        $organisation->email_id= $request->input('emailId');
        $organisation->opening_balance= $request->input('openingBalance');
        
       $organisation->save();
        //return $this->successResponse($organisation);
        return response()->json(['success'=>1,'data'=>$organisation], 200,[],JSON_NUMERIC_CHECK);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganisationRequest  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
