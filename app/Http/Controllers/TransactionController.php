<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use App\Http\Resources\TransactionMasterReceivedResource;
use App\Http\Resources\TransactionMasterSpecialResource;
use App\Models\CustomVoucher;
use App\Models\Ledger;
use App\Models\StudentCourseRegistration;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;
use App\Models\WorkingDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TransactionController extends ApiController
{
    //----- Nanda gopal code -------------_

    public function delete_adv_adjustment_received($id){
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
    public function get_adv_adjustment_received_master($orgID){
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_masters.reference_received_transaction_master_id', '>', 0)
        ->where('transaction_details.transaction_type_id', '=', 1)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where(DB::raw('get_total_received_by_studentregistration(transaction_masters.student_course_registration_id)- get_total_discount_by_studentregistration_id(transaction_masters.student_course_registration_id)'),'>',0)
        ->select('student_course_registration_id'
        ,'transaction_masters.reference_received_transaction_master_id'
        ,'ledgers.ledger_name'
        ,'courses.full_name'
        , DB::raw('sum(transaction_details.amount) as total_amount')
        ) 
        -> groupBy('transaction_masters.reference_received_transaction_master_id','transaction_masters.student_course_registration_id',
        'ledgers.ledger_name','courses.full_name')
        ->orderBy('transaction_masters.reference_received_transaction_master_id', 'DESC')
        ->get();
        foreach ($result as $row) {
            $row->setAttribute('adv_fees_received_details', $this->get_adv_adjustment_received_details($row->reference_received_transaction_master_id));
        }  
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);     
    
    }

    public function get_adv_adjustment_received_details($id){
        $result = DB::select("select transaction_masters.id,
        transaction_masters.reference_received_transaction_master_id,
        transaction_masters.transaction_date,
        transaction_masters.comment,
        transaction_details.amount
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
        inner join courses ON courses.id = student_course_registrations.course_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where reference_received_transaction_master_id>0 and transaction_details.transaction_type_id=1
        and transaction_masters.reference_received_transaction_master_id='$id'");

        return $result;
       //return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    
    }
    public function get_edit_adv_received($id){
        $result = DB::select("select ledgers.id,
        transaction_masters.student_course_registration_id,
        transaction_masters.id as transaction_masters_id, 
        transaction_details.ledger_id, 
        transaction_details.amount,
        transaction_masters.comment,
        transaction_masters.transaction_date
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where transaction_details.transaction_type_id=1 
        and transaction_masters.id='$id'");

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    
    }
    public function advanced_received_fees_details_by_studentToCourse_id($id){
        $result = DB::select("select get_advanced_received_by_studentregistration(id) as total_advanced,
        get_advanced_received_adjustment(id) as received_advanced,
        get_advanced_received_by_studentregistration(id)-get_advanced_received_adjustment(id) as advanced_due
        FROM student_course_registrations
        where id='$id'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_advanced_received_history_by_studentToCourse_id($id){
        $result = DB::select("select student_course_registrations.id,
        transaction_masters.id as master_id,
        ledgers.billing_name,
        ledgers.whatsapp_number,
        courses.full_name,
        transaction_details.amount,
        transaction_masters.transaction_date,
        transaction_masters.transaction_number,
        transaction_masters.voucher_type_id,
        transaction_masters.comment,
        get_advanced_received_by_studentregistration(student_course_registrations.id) as total_advanced,
        get_advanced_received_adjustment(student_course_registrations.id) as received_advanced,
        get_advanced_received_by_studentregistration(student_course_registrations.id)-get_advanced_received_adjustment(student_course_registrations.id) as advanced_due
          from transaction_masters
              inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
              inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
              inner join courses ON courses.id = student_course_registrations.course_id
              inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                where transaction_masters.reference_received_transaction_master_id>0 and transaction_details.transaction_type_id=1
                and transaction_masters.voucher_type_id=4
                and transaction_masters.student_course_registration_id='$id'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_advanced_received_history($orgID){
        $result = DB::select("select transaction_masters.id,
        transaction_masters.transaction_date,
        ledgers.ledger_name,
        courses.full_name,
        transaction_masters.student_course_registration_id,
        transaction_masters.comment,
        transaction_details.amount,
        get_advanced_received_adjustment(transaction_masters.student_course_registration_id) as advanced_received,
        (transaction_details.amount-get_advanced_received_adjustment_by_tran_id(transaction_masters.student_course_registration_id,transaction_masters.id)) as adv_due
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
        inner join courses ON courses.id = student_course_registrations.course_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where transaction_masters.voucher_type_id=10 and transaction_details.transaction_type_id=1 and
        transaction_masters.organisation_id='$orgID'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function advanced_received_fees_detatils($orgID){
        $result = DB::select("select transaction_masters.id,
        transaction_masters.transaction_date,
        ledgers.ledger_name,
        courses.full_name,
        transaction_masters.student_course_registration_id,
        transaction_masters.comment,
        transaction_details.amount,
        get_advanced_received_adjustment_by_tran_id(transaction_masters.student_course_registration_id,transaction_masters.id) as advanced_received,
        (transaction_details.amount-get_advanced_received_adjustment_by_tran_id(transaction_masters.student_course_registration_id,transaction_masters.id)) as adv_due
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join student_course_registrations ON student_course_registrations.id = transaction_masters.student_course_registration_id
        inner join courses ON courses.id = student_course_registrations.course_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where transaction_masters.voucher_type_id=10 and transaction_details.transaction_type_id=1
        and (transaction_details.amount-get_advanced_received_adjustment_by_tran_id(transaction_masters.student_course_registration_id,transaction_masters.id))>0
        and transaction_masters.organisation_id='$orgID'");

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_count_working_days(){
        $result=DB::select("select user_id,count_days,total_days,description,start_date,end_date,description,inforce,DATEDIFF(end_date,curdate()) AS date_difference from working_days");
       //$count_days=$result[0]->count_days;
        //$total_days=$result[0]->total_days;
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_organization_details_by_id($orgID){ 
        $result = DB::select("select id,
        organisation_name,
        address,
        city,
        district,
        pin,
        contact_number,
        whatsapp_number,
        email_id, branch,
        account_number 
        from organisations
        where id='$orgID'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_fees_received_details_by_registration_id(Request $request){  

       /*  DB::beginTransaction();
        try{
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select trans_master2.student_course_registration_id, 
        trans_master1.id,
        trans_master1.reference_transaction_master_id,
        table1.transaction_number,
        table1.transaction_date, 
        trans_master1.comment,
        table1.ledger_id,
        table1.ledger_name, 
        table1.temp_total_received,
        get_total_course_fees_by_studentregistration(trans_master2.student_course_registration_id) as totalDue
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
        and trans_master2.student_course_registration_id='$id' and trans_master2.organisation_id='$orgID' order by trans_master1.created_at desc");
        }
        DB::commit();

    }catch(\Exception $e){
        DB::rollBack();
        return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
    }
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK); */

        try{
            $orgID = $request->input('organisationId');
            $id = $request->input('id');
    
            $result = DB::select("select trans_master2.student_course_registration_id, 
            trans_master1.id,
            trans_master1.reference_transaction_master_id,
            table1.transaction_number,
            table1.transaction_date, 
            trans_master1.comment,
            table1.ledger_id,
            table1.ledger_name, 
            table1.temp_total_received,
            get_total_course_fees_by_studentregistration(trans_master2.student_course_registration_id) as totalDue
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
            and trans_master2.student_course_registration_id='$id' and trans_master2.organisation_id='$orgID' order by trans_master1.created_at desc");
       
        }catch(\Exception $e){
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }
    
    public function get_upcoming_due_list_entry(Request $request)
    {
        $ledgerId = $request->input('ledger_id');
        $tranId = $request->input('transaction_id');
        //echo $ledgerId;
        $result = DB::select("select distinct transaction_masters.id,transaction_masters.student_course_registration_id,
        transaction_details.ledger_id
        ,ledgers.ledger_name
        ,get_total_fees_charge_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,transaction_details.ledger_id) as total_billed
        ,get_total_fees_received_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,transaction_details.ledger_id)
         as total_received
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join ledgers ON ledgers.id = transaction_details.ledger_id
        inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
        where ledger_groups.id=6
        and transaction_masters.id='$tranId' and ledgers.id='$ledgerId'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_all_receipt_by_registration_id(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select ledgers.ledger_name as student_name,ledgers.billing_name,
        ledgers.whatsapp_number,
                courses.full_name,
                trans_master2.student_course_registration_id, 
                        trans_master1.id,
                        trans_master1.reference_transaction_master_id,
                        trans_master1.comment,
                        table1.transaction_number,
                        table1.transaction_date, 
                        table1.ledger_id,
                        table1.ledger_name, 
                        table1.temp_total_received,
                        table1.created_at,
                        get_total_course_fees_by_studentregistration(trans_master2.student_course_registration_id) as total_course_fees,
                        get_total_discount_by_studentregistration_id(trans_master2.student_course_registration_id) as total_discount
                        from transaction_masters trans_master1,transaction_masters trans_master2
                        inner join (select transaction_masters.id,
                                          transaction_masters.transaction_number,
                                          transaction_masters.transaction_date,
                                          transaction_masters.created_at,
                                          transaction_details.ledger_id,
                                          ledgers.ledger_name,
                                          ledgers.billing_name,
                                          transaction_details.amount as temp_total_received from transaction_masters
                                          inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                          inner join ledgers ON ledgers.id = transaction_details.ledger_id
                                          where transaction_masters.voucher_type_id=4
                                          and transaction_details.transaction_type_id=1 and transaction_details.ledger_id not in(11)) as table1
                        inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
                        inner join courses ON courses.id = student_course_registrations.course_id
                        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                        where trans_master1.reference_transaction_master_id=trans_master2.id
                        and table1.id = trans_master1.id and trans_master2.student_course_registration_id='$id'
                        and trans_master2.organisation_id='$orgID' order by table1.created_at desc");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    } 
     public function get_receipt_by_transaction_id(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select ledgers.ledger_name as student_name,
        ledgers.billing_name,
        ledgers.whatsapp_number,
        courses.full_name,
        trans_master2.student_course_registration_id, 
                trans_master1.id,
                trans_master1.reference_transaction_master_id,
                trans_master1.comment,
                table1.transaction_number,
                table1.transaction_date, 
                table1.ledger_id,
                table1.ledger_name, 
                table1.temp_total_received,
                get_total_course_fees_by_studentregistration(trans_master2.student_course_registration_id) as total_course_fees
                from transaction_masters trans_master1,transaction_masters trans_master2
                inner join (select transaction_masters.id,
                                  transaction_masters.transaction_number,
                                  transaction_masters.transaction_date,
                                  transaction_details.ledger_id,
                                  ledgers.ledger_name,
                                  ledgers.billing_name,
                                  transaction_details.amount as temp_total_received from transaction_masters
                                  inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                  inner join ledgers ON ledgers.id = transaction_details.ledger_id
                                  where transaction_masters.voucher_type_id=4
                                  and transaction_details.transaction_type_id=1) as table1
                inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
                inner join courses ON courses.id = student_course_registrations.course_id
                inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                where trans_master1.reference_transaction_master_id=trans_master2.id
                and table1.id = trans_master1.id and trans_master1.id='$id' and trans_master1.organisation_id='$orgID'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    } 
    public function get_all_feeReceived($orgID)
    {
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_details.transaction_type_id', '=', 2)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where(DB::raw('get_total_received_by_studentregistration(transaction_masters.student_course_registration_id)- get_total_discount_by_studentregistration_id(transaction_masters.student_course_registration_id)'),'>',0)
        ->select('student_course_registration_id'
        ,'ledgers.ledger_name'
        ,'courses.full_name'
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
        and table1.ledger_id NOT IN (11)
        order by trans_master1.created_at desc");
       return $result;
    }
    public function get_all_feeCharge($orgID)
    {
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_details.transaction_type_id', '=', 2)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->select('student_course_registration_id',
          DB::raw('sum(transaction_details.amount) as fees_total')
        )
        -> groupBy('student_course_registration_id')
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
    public function get_total_discount_by_trans_id(Request $request){

        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
        ->where('transaction_details.ledger_id', '=', 11)
        ->where('transaction_masters.voucher_type_id', '=', 4)
        ->where('transaction_details.transaction_type_id', '=', 1)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where('transaction_masters.reference_transaction_master_id', '=',$id)
        ->select('transaction_masters.reference_transaction_master_id'
        ,'ledgers.ledger_name'
        , DB::raw('sum(transaction_details.amount) as temp_total_discount')
        )
        -> groupBy('transaction_masters.reference_transaction_master_id','ledgers.ledger_name')
        ->get();
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_all_feeDiscount($orgID)
    {
        $result = TransactionMaster::
         join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where(DB::raw('get_total_fees_discount_transaction_id(transaction_masters.id)'),'>',0)
        ->select('transaction_masters.id'
        ,DB::raw('max(ledgers.ledger_name) as ledger_name')
        ,DB::raw('max(courses.full_name) as full_name')
        ,DB::raw('get_total_fees_discount_transaction_id(transaction_masters.id) as total_discount')
        )
        -> groupBy('transaction_masters.id')
        ->get();
        foreach ($result as $row) {
            $row->setAttribute('fees_discounts', $this->get_fees_discount_details_by_id($row->id));
        } 
        //return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
       return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);

    }
    public function get_fees_discount_details_by_id($id){
        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
        ->where('transaction_masters.id', '=', $id)
        ->where('transaction_details.transaction_type_id', '=',2)
        ->select('transaction_masters.id'
        ,'transaction_masters.transaction_date'
        ,'transaction_masters.transaction_number'
        ,'ledgers.ledger_name'
         )
        ->get();
        return $result;
//        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_fees_charge_details_main_by_id(Request $request){

        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
        ->where('student_course_registration_id', '=', $id)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where('transaction_details.transaction_type_id', '=',2)
        ->where('transaction_masters.voucher_type_id', '=',9)
        ->select('student_course_registration_id'
        ,'transaction_masters.id'
        ,'transaction_masters.transaction_date'
        ,'transaction_masters.transaction_number'
        ,'transaction_masters.fees_month'
        ,'ledgers.ledger_name'
        ,'transaction_details.amount')
        ->get();
        //return $result;
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_fees_charge_details_main_by_id_old($studentToRegistationId){
        $result = TransactionMaster::whereStudentCourseRegistrationId($studentToRegistationId)
           ->get();
       
        //return $result;
        //return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        return $this->successResponse(TransactionMasterResource::collection($result));
    }
    public function get_fees_Received_details_main_by_id_old($studentToRegistationId){
        $result = TransactionMaster::whereStudentCourseRegistrationId($studentToRegistationId)
           ->get();
       
        //return $result;
        //return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        return $this->successResponse(TransactionMasterReceivedResource::collection($result));
    }
    public function get_fees_due_list_edit_by_tran_id(Request $request){

        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select distinct transaction_masters.id,transaction_masters.student_course_registration_id,
        transaction_details.ledger_id
        ,ledgers.ledger_name
        ,get_total_fees_charge_by_transaction_ledger_id(transaction_masters.id,transaction_details.ledger_id) as total_billed
        ,get_total_received_by_transaction_id(transaction_masters.id)
         as total_received,
         get_total_due_by_transaction_id(transaction_masters.id)*-1 as total_due
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join ledgers ON ledgers.id = transaction_details.ledger_id
        inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
        where ledger_groups.id=6 and transaction_masters.id='$id' and transaction_masters.organisation_id='$orgID'");
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_fees_due_list_by_tran_id(Request $request){

        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select distinct transaction_masters.id,transaction_masters.student_course_registration_id,
        transaction_details.ledger_id
        ,ledgers.ledger_name
        ,get_total_fees_charge_by_transaction_ledger_id(transaction_masters.id,transaction_details.ledger_id) as total_billed
        ,get_total_received_by_transaction_id(transaction_masters.id)
         as total_received,
         get_total_due_by_transaction_id(transaction_masters.id)*-1 as total_due
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join ledgers ON ledgers.id = transaction_details.ledger_id
        inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
        where ledger_groups.id=6
        and  get_total_due_by_transaction_id(transaction_masters.id)*-1>0
        and transaction_masters.id='$id' and transaction_masters.organisation_id='$orgID'");
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_fees_received_edit_by_tran_id(Request $request){

        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select ledgers.id as studentId,
        ledgers.ledger_name as student_name,
                ledgers.whatsapp_number,
                        courses.full_name,
                        trans_master2.student_course_registration_id, 
                                trans_master1.id as transaction_master_id,
                                trans_master1.reference_transaction_master_id,
                                trans_master1.reference_received_transaction_master_id,
                                trans_master1.comment,
                                table1.transaction_number,
                                table1.transaction_date, 
                                table1.ledger_id as ledgerId,
                                table1.ledger_name, 
                                table1.received_amount
                               from transaction_masters trans_master1,transaction_masters trans_master2
                                inner join (select transaction_masters.id,
                                                  transaction_masters.transaction_number,
                                                  transaction_masters.transaction_date,
                                                  transaction_masters.created_at,
                                                  transaction_details.ledger_id,
                                                  ledgers.ledger_name,
                                                  ledgers.billing_name,
                                                  transaction_details.amount as received_amount from transaction_masters
                                                  inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                                                  inner join ledgers ON ledgers.id = transaction_details.ledger_id
                                                  where transaction_masters.voucher_type_id=4
                                                  and transaction_details.transaction_type_id=1) as table1
                                inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
                                inner join courses ON courses.id = student_course_registrations.course_id
                                inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                                where trans_master1.reference_transaction_master_id=trans_master2.id
                                and table1.id = trans_master1.id and trans_master1.id='$id' and trans_master1.organisation_id='$orgID'");
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_fees_due_list_by_id($id){
        $result = DB::select("select distinct transaction_masters.id,transaction_masters.student_course_registration_id,
        transaction_details.ledger_id
        ,ledgers.ledger_name
        ,get_total_fees_charge_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,transaction_details.ledger_id) as total_billed
        ,get_total_fees_received_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,transaction_details.ledger_id)
        + get_total_fees_discount_by_studentregistration_ledger_id(transaction_masters.student_course_registration_id,transaction_details.ledger_id)
        as total_received
        from transaction_masters
        inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
        inner join ledgers ON ledgers.id = transaction_details.ledger_id
        inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
        where ledger_groups.id=6
        and transaction_masters.student_course_registration_id='$id'");
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_feeCharge_by_id(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        //$courseRegistration= StudentCourseRegistration::get();
        $result = DB::table('transaction_masters')
        ->join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
        ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
        ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
        ->where('transaction_masters.id', '=', $id)
        ->where('transaction_masters.organisation_id', '=', $orgID)
        ->where('transaction_details.transaction_type_id', '=', 2)
        ->where('transaction_masters.voucher_type_id', '=',9)
        ->select(
        'transaction_masters.id',
        'ledgers.ledger_name',
        'transaction_masters.student_course_registration_id',
        DB::raw('student_course_registrations.ledger_id as student_id'),
        'transaction_masters.transaction_date',
        'transaction_masters.comment',
        'transaction_details.amount',
        'transaction_details.ledger_id'
        )
           ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    // End Nanda gopal code

    public function get_transaction_masterId_update_by_student_id(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');
      
         $transactionMaster = DB::select("select distinct transaction_masters.id,transaction_masters.transaction_number,
         get_total_due_by_transaction_id(transaction_masters.id)*-1 as total_due
         from transaction_masters
         inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
         inner join ledgers ON ledgers.id = transaction_details.ledger_id
         inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
         where ledger_groups.id=6 and transaction_masters.student_course_registration_id='$id' and transaction_masters.organisation_id='$orgID'"); 
        return response()->json(['success'=>1,'data'=> $transactionMaster], 200,[],JSON_NUMERIC_CHECK);

        //return response()->json(['success'=>0,'data'=>TransactionMasterResource::collection($transactions)], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_transaction_masterId_by_student_id(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');
      
         $transactionMaster = DB::select("select distinct transaction_masters.id,transaction_masters.transaction_number,
         get_total_due_by_transaction_id(transaction_masters.id)*-1 as total_due,ledgers.ledger_name
         from transaction_masters
         inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
         inner join ledgers ON ledgers.id = transaction_details.ledger_id
         inner join ledger_groups ON ledger_groups.id = ledgers.ledger_group_id
         where ledger_groups.id=6 and
         (get_total_due_by_transaction_id(transaction_masters.id)*-1)>0
          and transaction_masters.student_course_registration_id='$id' and transaction_masters.organisation_id='$orgID'"); 
        return response()->json(['success'=>1,'data'=> $transactionMaster], 200,[],JSON_NUMERIC_CHECK);

        //return response()->json(['success'=>0,'data'=>TransactionMasterResource::collection($transactions)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_all_transactions(){
        $transactions = TransactionMaster::get();
        return response()->json(['success'=>0,'data'=>TransactionMasterResource::collection($transactions)], 200,[],JSON_NUMERIC_CHECK);
    }
    //get fees charged transactions
    public function get_all_fees_charged_transactions(){
        $transactions = TransactionMaster::where('voucher_type_id',9)->get();
        return response()->json(['success'=>0,'data'=>TransactionMasterResource::collection($transactions)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_total_dues_by_student_id($id){
        $debit = TransactionDetail::where('ledger_id',$id)->where('transaction_type_id',1)->sum('amount');
        $credit = TransactionDetail::where('ledger_id',$id)->where('transaction_type_id',2)->sum('amount');
        return response()->json(['success'=>0,'data'=>$debit-$credit], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_student_due_by_student_course_registration_id($id){
        //getting student course registration id
        try{
            $id =TransactionMaster::where('student_course_registration_id',2)->first()->id;
            $credit = TransactionDetail::where('transaction_master_id',1)->where('transaction_type_id',2)->sum('amount');

            $tm_ids=TransactionMaster::where('reference_transaction_master_id',$id)->get()->pluck('id');

            $debit=TransactionDetail::whereIn('transaction_master_id',$tm_ids)->where('transaction_type_id',1)->sum('amount');
        $total_due = $credit - $debit;
        return response()->json(['success'=>1,'data'=>$total_due], 200,[],JSON_NUMERIC_CHECK);
        }catch(\Exception $e){
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
    }
    //testing
    //saving fees charging to student
    public function save_fees_charge(Request $request)
    {
        $input=($request->json()->all());

        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;

                foreach ($value as $v ){

                    /*
                     * This is a fees charging transaction, hence only a student can be debited
                     * */
                    if($v['transactionTypeId']==1){
                        $student = Ledger::find($v['ledgerId']);
                        if(!$student){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($student->is_student==0){
                            return $fail("Only student can be Debited");
                        }
                    }
                    /*
                     * This is a fees charging transaction, hence only fees ca be credited
                     * */

                    if($v['transactionTypeId']==2){
                        $ledger = Ledger::find($v['ledgerId']);
                        if(!$ledger){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($ledger->ledger_group_id!=6){
                            return $fail("This is not belongs to income ledger like fees");
                        }
                    }


                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }
                    if($v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }

                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }


            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        //validation
        $rules = array(
            'userId'=>'required|exists:users,id',
            'transactionDate' => 'bail|required|date_format:Y-m-d',
            'studentCourseRegistrationId' => ['bail','required',
                function($attribute, $value, $fail){
                    $StudentCourseRegistration=StudentCourseRegistration::where('id', $value)->where('is_completed','=',0)->first();
                    if(!$StudentCourseRegistration){
                        $fail($value.' is not a valid Course Registration Number');
                    }
                }],
        );
        $messages = array(
            'transactionDate.required'=>'Transaction Date is required',
            'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
        );

        $validator = Validator::make($input['transactionMaster'],$rules,$messages );


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
        $rules = array(
            "*.transactionTypeId"=>'required|in:1,2'
        );
        $validator = Validator::make($input['transactionDetails'],$rules,$messages );
        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Fees Charged";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='FEES';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
            $transaction_master->comment = 'Fees Charged';
            $transaction_master->fees_year = $input_transaction_master->feesYear;
            $transaction_master->fees_month = $input_transaction_master->feesMonth;
            $transaction_master->organisation_id = $input_transaction_master->organisationId;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
    public function save_fees_discount_charge(Request $request)
    {
        $input=($request->json()->all());

        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;

                foreach ($value as $v ){

                    /*
                     * This is a fees charging transaction, hence only a student can be debited
                     * */
                   /*  if($v['transactionTypeId']==1){
                        $student = Ledger::find($v['ledgerId']);
                        if(!$student){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($student->is_student==0){
                            return $fail("Only student can be Debited");
                        }
                    } */
                    /*
                     * This is a fees charging transaction, hence only fees ca be credited
                     * */

                   /*  if($v['transactionTypeId']==2){
                        $ledger = Ledger::find($v['ledgerId']);
                        if(!$ledger){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($ledger->ledger_group_id!=6){
                            return $fail("This is not belongs to income ledger like fees");
                        }
                    } */


                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }
                    if($v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }

                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }


            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        //validation
        $rules = array(
            'userId'=>'required|exists:users,id',
            'transactionDate' => 'bail|required|date_format:Y-m-d',
            'studentCourseRegistrationId' => ['bail','required',
                function($attribute, $value, $fail){
                    $StudentCourseRegistration=StudentCourseRegistration::where('id', $value)->where('is_completed','=',0)->first();
                    if(!$StudentCourseRegistration){
                        $fail($value.' is not a valid Course Registration Number');
                    }
                }],
        );
        $messages = array(
            'transactionDate.required'=>'Transaction Date is required',
            'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
        );

        $validator = Validator::make($input['transactionMaster'],$rules,$messages );


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
        $rules = array(
            "*.transactionTypeId"=>'required|in:1,2'
        );
        $validator = Validator::make($input['transactionDetails'],$rules,$messages );
        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Fees Charged";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='FEES';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
            $transaction_master->comment = $input_transaction_master->comment;
            $transaction_master->fees_year = $input_transaction_master->feesYear;
            $transaction_master->fees_month = $input_transaction_master->feesMonth;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
     //update fees charging to student
     public function update_fees_charge($id,Request $request)
     {
         $input=($request->json()->all());



         $input=($request->json()->all());
         $input_transaction_master=(object)($input['transactionMaster']);
         $input_transaction_details=($input['transactionDetails']);

         //validation
        DB::beginTransaction();
         try{
             $result_array=array();

             // ------ delete record ---------
             $tran_details=TransactionDetail::where('transaction_master_id',$id)->delete();
             if(!$tran_details){
                return response()->json(['success'=>1,'data'=>'Sorry Data Not Deleted:'.$id], 200,[],JSON_NUMERIC_CHECK);
             }
             //adding Zeros before number

             //creating sale bill number


             //saving transaction master
             //$transaction_master= new TransactionMaster();
             //$transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
             //$transaction_master->transaction_number = $transaction_number;


             $transaction_master=TransactionMaster::find($id);
             if($input_transaction_master->transactionDate){
                $transaction_master->transaction_date = $input_transaction_master->transactionDate;
             }
             if($input_transaction_master->studentCourseRegistrationId){
                $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
             }
             if($input_transaction_master->comment){
                $transaction_master->comment = $input_transaction_master->comment;
             }
             $transaction_master->save();

             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;


             DB::commit();

         }catch(\Exception $e){
             DB::rollBack();
             return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
         }

         return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
     }
    //monthly fees charged
    public function save_monthly_fees_charge(Request $request)
    {
        $input=($request->json()->all());
//        return $this->successResponse($TM->studentCourseRegistrationId);

        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;
                $monthly_fees_entry_count=0;
                foreach ($value as $v ){
                    if(!isset($v['ledgerId'])){
                        return $fail("Ledger Id is missing");
                    }
                    if(!isset($v['amount'])){
                        return $fail("Amount is missing");
                    }
                    if(!isset($v['transactionTypeId'])){
                        return $fail("Transaction type is missing");
                    }

                    if($v['ledgerId']==9 && $v['transactionTypeId']!=2){
                        return $fail("Cr. is only allowed for Monthly fees");
                    }
                    if($v['ledgerId']==9 && $v['transactionTypeId']==2){
                        $monthly_fees_entry_count++;
                    }
                    if($monthly_fees_entry_count>1){
                        return $fail("Monthly fees should be one");
                    }
                    /*
                     * This is a fees charging transaction, hence only a student can be debited
                     * */
                    if($v['transactionTypeId']==1){
                        $student = Ledger::find($v['ledgerId']);
                        if(!$student){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($student->is_student==0){
                            return $fail("Only student can be Debited");
                        }
                    }
                    /*
                     * This is a fees charging transaction, hence only fees ca be credited
                     * */

                    if($v['transactionTypeId']==2){
                        $ledger = Ledger::find($v['ledgerId']);
                        if(!$ledger){
                            return $fail($v['ledgerId']." this ledger does not exist");
                        }
                        if($ledger->ledger_group_id!=6){
                            return $fail("This is not belongs to income ledger like fees");
                        }
                    }


                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }
                    if($v['amount'] && $v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['amount'] && $v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }

                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }


            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        // now we have two essential elements transactionMaster and transactionDetails
        // we need to check their validity one by one
        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);


        //validation var transactionMaster
        $rules = array(
            'userId'=>'required|exists:users,id',
            'transactionDate' => 'bail|required|date_format:Y-m-d',
            'studentCourseRegistrationId' => ['bail','required',
                function($attribute, $value, $fail){
                    if(StudentCourseRegistration::find($value)->effective_date==null){
                        return $fail('You cant charge monthly fees without Effective Date');
                    }
                    $StudentCourseRegistration=StudentCourseRegistration::where('id', $value)->where('is_completed','=',0)->first();
                    if(!$StudentCourseRegistration){
                        return $fail($value.' is not a valid Course Registration Number');
                    }
                    $fees_mode_type_id=StudentCourseRegistration::find($value)->course->fees_mode_type->id;
                    if($fees_mode_type_id<>1){
                        return $fail("This is not monthly paid course");
                    }
                }],
        );
        $messages = array(
            'transactionDate.required'=>'Transaction Date is required',
            'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
        );

        $validator = Validator::make($input['transactionMaster'],$rules,$messages );


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
        $rules = array(
            "*.transactionTypeId"=>'required|in:1,2',
            "*.ledgerId"=>'exists:ledgers,id',
            "*.amount"=>'required'
        );
        $validator = Validator::make($input['transactionDetails'],$rules,$messages );
        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //calculating number of monthly fees charged for this SCR
        $monthly_fees_charged_count=TransactionMaster::whereHas('transaction_details',function($query){
            $query->where('ledger_id',9);
        })->where('student_course_registration_id',$input_transaction_master->studentCourseRegistrationId)->where('voucher_type_id',9)->count();


        //getting effective date, validation for effective date already done
        $effective_date = StudentCourseRegistration::find($input_transaction_master->studentCourseRegistrationId)->effective_date;

        //getting notional monthly fees charge
        $notional_monthly_fees_charge_count = StudentCourseRegistration::select(DB::raw("TIMESTAMPDIFF(MONTH, effective_date, CURDATE())+1 as notional_fees_charge"))
                                        ->where('id',$input_transaction_master->studentCourseRegistrationId)
                                        ->where('is_completed',0)
                                        ->where('is_started',1)
                                        ->first()->notional_fees_charge;

        if($monthly_fees_charged_count>$notional_monthly_fees_charge_count-1){
            return $this->errorResponse("Account Already up to date ",406);
        }
        if($monthly_fees_charged_count==0){
            $fees_month = (int)StudentCourseRegistration::select(DB::raw('month(effective_date) as current_month'))->where('id',$input_transaction_master->studentCourseRegistrationId)->first()->current_month;
            $fees_year = (int)StudentCourseRegistration::select(DB::raw('year(effective_date) as current_year'))->where('id',$input_transaction_master->studentCourseRegistrationId)->first()->current_year;
        }else{
            $LastMonthlyEntry = TransactionMaster::whereHas('transaction_details',function($query){
                $query->where('ledger_id',9);
            })->where('student_course_registration_id',$input_transaction_master->studentCourseRegistrationId)
                ->where('voucher_type_id',9)
                ->orderBy('fees_year', 'desc')
                ->orderBy('fees_month', 'desc')
                ->first();
            $fees_year = get_next_year((int)$LastMonthlyEntry->fees_year,(int)$LastMonthlyEntry->fees_month);
            $fees_month = get_next_month((int)$LastMonthlyEntry->fees_year,(int)$LastMonthlyEntry->fees_month);

        }
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Fees Charged";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='FEES';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
            $transaction_master->comment = $input_transaction_master->comment;
            $transaction_master->fees_year = $fees_year;
            $transaction_master->fees_month = $fees_month;
            $transaction_master->organisation_id = $input_transaction_master->organisationId;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'monthly_fees_charged_count'=>$monthly_fees_charged_count,'notional_monthly_fees_charge_count'=>$notional_monthly_fees_charge_count,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
    //Update advanced_fees_received
    public function update_advanced_fees_received($id,Request $request)
     {

         $input=($request->json()->all());
         $input_transaction_master=(object)($input['transactionMaster']);
         $input_transaction_details=($input['transactionDetails']);

         DB::beginTransaction();
         try{
             $result_array=array();

             // ------ delete record ---------
             $tran_details=TransactionDetail::where('transaction_master_id',$id)->delete();
             if(!$tran_details){
                return response()->json(['success'=>1,'data'=>'Sorry Data Not Deleted:'.$id], 200,[],JSON_NUMERIC_CHECK);
             }
             //adding Zeros before number

             //creating sale bill number


             //saving transaction master
             //$transaction_master= new TransactionMaster();
             //$transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
             //$transaction_master->transaction_number = $transaction_number;


             $transaction_master=TransactionMaster::find($id);
             if($input_transaction_master->transactionDate){
                $transaction_master->transaction_date = $input_transaction_master->transactionDate;
             }
             if($transaction_master->student_course_registration_id){
                $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
             }     
             if($input_transaction_master->comment){
                $transaction_master->comment = $input_transaction_master->comment;
             }
             $transaction_master->save();

             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;
             DB::commit();
 
         }catch(\Exception $e){
             DB::rollBack();
             return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
         }
 
         return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
     }
    //fees Advanced received
    public function save_advanced_fees_received(Request $request)
    {
        $input=($request->json()->all());
        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;
                foreach ($value as $v ){
                    //if transaction type id is incorrect
                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }

                    //checking debit and credit equality
                    if($v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }
                //if debit and credit are not equal will through error
                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }
            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        //validation for transaction master
      


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
       
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Advanced Fees Received";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='ARPT';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 10; // 10 is the voucher_type_id in voucher_types table for Advanced Receipt voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
            $transaction_master->fees_year = $input_transaction_master->feesYear;
            $transaction_master->fees_month = $input_transaction_master->feesMonth;
            $transaction_master->comment = $input_transaction_master->comment;
            $transaction_master->organisation_id = $input_transaction_master->organisationId;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
     //Advanced fees received Adjustment
     public function save_advanced_fees_received_adjustment(Request $request)
     {
         $input=($request->json()->all());
 
         $validator = Validator::make($input,[
             'transactionMaster' => 'required',
             'transactionDetails' => ['required',function($attribute, $value, $fail){
                 $dr=0;
                 $cr=0;
                 foreach ($value as $v ){
                     //if transaction type id is incorrect
                     if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                         return $fail("Transaction type id is incorrect");
                     }
 
                     //checking debit and credit equality
                     if($v['transactionTypeId']==1){
                         $dr=$dr+$v['amount'];
                     }
                     if($v['transactionTypeId']==2){
                         $cr=$cr+$v['amount'];
                     }
                 }
                 //if debit and credit are not equal will through error
                 if($dr!=$cr){
                     $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                 }
             }],
         ]);
         if($validator->fails()){
             return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
         }
 
         $input=($request->json()->all());
         $input_transaction_master=(object)($input['transactionMaster']);
         $input_transaction_details=($input['transactionDetails']);
 
         //validation for transaction master
         $rules = array(
             'userId'=>'required|exists:users,id',
             'transactionDate' => 'bail|required|date_format:Y-m-d',
             'referenceTransactionMasterId'=>['required','exists:transaction_masters,id',
                 function($attribute, $value, $fail){
                     $TM = TransactionMaster::find($value);
                     if(!$TM){
                         return $fail($value.' no such transactions exists');
                     }
                     if($TM->voucher_type_id!=9){
                         return $fail($value.' this is not a Fees Entry');
                     }
                 }]
         );
         $messages = array(
             'transactionDate.required'=>'Transaction Date is required',
             'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
         );
 
         $validator = Validator::make($input['transactionMaster'],$rules,$messages );
 
 
         if ($validator->fails()) {
             return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
         }
 
         //details verification
         //validation
         $rules = array(
             "*.transactionTypeId"=>["required","in:1,2"]
         );
         $validator = Validator::make($input['transactionDetails'],$rules,$messages );
         if ($validator->fails()) {
             return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
         }
         DB::beginTransaction();
         try{
             $result_array=array();
             $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
             $voucher="Fees Received Adjustment";
             $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
             if($customVoucher) {
                 //already exist
                 $customVoucher->last_counter = $customVoucher->last_counter + 1;
                 $customVoucher->save();
             }else{
                 //fresh entry
                 $customVoucher= new CustomVoucher();
                 $customVoucher->voucher_name=$voucher;
                 $customVoucher->accounting_year= $accounting_year;
                 $customVoucher->last_counter=1;
                 $customVoucher->delimiter='-';
                 $customVoucher->prefix='RPTA';
                 $customVoucher->save();
             }
             //adding Zeros before number
             $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);
 
             //creating sale bill number
             $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
             $result_array['transaction_number']=$transaction_number;
 
             //saving transaction master
             $transaction_master= new TransactionMaster();
             $transaction_master->voucher_type_id = 4; // 4 is the voucher_type_id in voucher_types table for Receipt voucher
             $transaction_master->transaction_number = $transaction_number;
             $transaction_master->transaction_date = $input_transaction_master->transactionDate;
             $transaction_master->fees_year = $input_transaction_master->feesYear;
             $transaction_master->fees_month = $input_transaction_master->feesMonth;
             $transaction_master->student_course_registration_id = $input_transaction_master->studentCourseRegistrationId;
             $transaction_master->reference_transaction_master_id = $input_transaction_master->referenceTransactionMasterId;
             $transaction_master->reference_received_transaction_master_id = $input_transaction_master->referenceReceivedTransactionMasterId;
             $transaction_master->comment = $input_transaction_master->comment;
             $transaction_master->organisation_id = $input_transaction_master->organisationId;
             $transaction_master->save();
             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;
             DB::commit();
 
         }catch(\Exception $e){
             DB::rollBack();
             return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
         }
 
         return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
     }
    //fees received
    public function save_fees_received(Request $request)
    {
        $input=($request->json()->all());

        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;
                foreach ($value as $v ){
                    //if transaction type id is incorrect
                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }

                    //checking debit and credit equality
                    if($v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }
                //if debit and credit are not equal will through error
                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }
            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        //validation for transaction master
        $rules = array(
            'userId'=>'required|exists:users,id',
            'transactionDate' => 'bail|required|date_format:Y-m-d',
            'referenceTransactionMasterId'=>['required','exists:transaction_masters,id',
                function($attribute, $value, $fail){
                    $TM = TransactionMaster::find($value);
                    if(!$TM){
                        return $fail($value.' no such transactions exists');
                    }
                    if($TM->voucher_type_id!=9){
                        return $fail($value.' this is not a Fees Entry');
                    }
                }]
        );
        $messages = array(
            'transactionDate.required'=>'Transaction Date is required',
            'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
        );

        $validator = Validator::make($input['transactionMaster'],$rules,$messages );


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
        $rules = array(
            "*.transactionTypeId"=>["required","in:1,2"]
        );
        $validator = Validator::make($input['transactionDetails'],$rules,$messages );
        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Fees Received";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='RPT';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 4; // 4 is the voucher_type_id in voucher_types table for Receipt voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->fees_year = $input_transaction_master->feesYear;
            $transaction_master->fees_month = $input_transaction_master->feesMonth;
            $transaction_master->reference_transaction_master_id = $input_transaction_master->referenceTransactionMasterId;
            $transaction_master->comment = $input_transaction_master->comment;
            $transaction_master->organisation_id = $input_transaction_master->organisationId;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
     //Update fees received
     public function update_fees_received($id,Request $request)
     {

         $input=($request->json()->all());
         $input_transaction_master=(object)($input['transactionMaster']);
         $input_transaction_details=($input['transactionDetails']);

         DB::beginTransaction();
         try{
             $result_array=array();

             // ------ delete record ---------
             $tran_details=TransactionDetail::where('transaction_master_id',$id)->delete();
             if(!$tran_details){
                return response()->json(['success'=>1,'data'=>'Sorry Data Not Deleted:'.$id], 200,[],JSON_NUMERIC_CHECK);
             }
             //adding Zeros before number

             //creating sale bill number


             //saving transaction master
             //$transaction_master= new TransactionMaster();
             //$transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
             //$transaction_master->transaction_number = $transaction_number;


             $transaction_master=TransactionMaster::find($id);
             if($input_transaction_master->transactionDate){
                $transaction_master->transaction_date = $input_transaction_master->transactionDate;
             }
             if($input_transaction_master->comment){
                $transaction_master->comment = $input_transaction_master->comment;
             }
             $transaction_master->save();

             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;
             DB::commit();
 
         }catch(\Exception $e){
             DB::rollBack();
             return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
         }
 
         return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
     }
    public function get_bill_details_by_id($id){
        $tm = TransactionMaster::find($id);
        $feesChargedTM = TransactionMaster::find($tm->reference_transaction_master_id);
        $feesCharged = TransactionDetail::where('transaction_master_id',$feesChargedTM->id)->where('transaction_type_id',2)->sum('amount');
        $feesPaid = TransactionDetail::where('transaction_master_id',$id)->where('transaction_type_id',2)->first();

        $feesPaidIds = TransactionMaster::where('reference_transaction_master_id',$tm->reference_transaction_master_id)->get()->pluck('id');
        $totalFeesPaid = TransactionDetail::whereIn('transaction_master_id',$feesPaidIds)->where('transaction_type_id',2)->sum('amount');

        $currentDues = $feesCharged - $totalFeesPaid;
        $studentDetails = Ledger::find($feesPaid->ledger_id);
        return response()->json(['success'=>1,
            'fessPaid'=>$totalFeesPaid,'due'=>$currentDues,'student'=>$studentDetails], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_feescharge_received_due_list_by_id($id){
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
        //return $result;
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_month_student_list($orgID){
      //public static $m;
       //foreach ($request->product_id as $key => $product_id)
       //,DB::raw('ADDDATE(max(transaction_masters.transaction_date),INTERVAL DAY(LAST_DAY(max(transaction_masters.transaction_date))) DAY) as transaction_date')
       /* $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDays(3);
          //$currentDateTime = new Carbon($x->transaction_date);
        //$m=$x->transaction_date->addDays(5);
        //$trdate = Carbon::$currentDateTime->addDays(3);
        print_r($currentDateTime);
        print_r($newDateTime); */
        //$currentDateTime = Carbon::now()->addDays(3);
        /* echo 'Original:'.$x->transaction_date.'<br>';
        echo '--------------------------'.'<br>';
        $current = Carbon::create($x->transaction_date);
        $trialExpires = $current->addDays($x->DaysInMonth);
        echo 'Add days:'.$trialExpires.'<br>'; */

        $result = TransactionMaster::
        join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
       ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
       ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
       ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
       ->where('transaction_details.ledger_id','=',9)
       ->where('courses.fees_mode_type_id','=',1)
       ->where('transaction_masters.organisation_id', '=', $orgID)
       ->having(DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE())'),'>',0)
       ->orderBy('transaction_masters.fees_month','desc')
       ->select('transaction_masters.student_course_registration_id'
       ,DB::raw('student_course_registrations.ledger_id as student_id')
       ,'ledgers.ledger_name'
       ,'courses.full_name'
       ,DB::raw('CURDATE() as fee_charge_date')
       ,DB::raw('max(transaction_masters.transaction_date) as transaction_date')
       ,DB::raw('max(transaction_masters.fees_month) as  fees_month')
       ,DB::raw('max(transaction_masters.fees_year) as fees_year')
       ,DB::raw('month(CURDATE()) as currmonth')
       ,DB::raw('year(CURDATE()) as curryear')
       ,DB::raw('max(transaction_details.amount) as amount')
       ,DB::raw('DAY(LAST_DAY(max(transaction_masters.transaction_date))) as DaysInMonth')
       ,DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE()) as monthDiff')
       )
       -> groupBy('transaction_masters.student_course_registration_id','courses.full_name','student_course_registrations.ledger_id','ledgers.ledger_name')
       ->get(); 
      
      
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_month_student_list_testing($orgID){
      
       $result = TransactionMaster::
       join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
      ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
      ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
      ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
      ->where('transaction_details.ledger_id','=',9)
      ->where('courses.fees_mode_type_id','=',1)
      ->where('transaction_masters.organisation_id', '=', $orgID)
      ->having(DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE())'),'>',0)
      ->orderBy('transaction_masters.fees_month','desc')
      ->select('transaction_masters.student_course_registration_id'
      ,DB::raw('student_course_registrations.ledger_id as student_id')
      ,'ledgers.ledger_name'
      ,'courses.full_name'
      ,DB::raw('CURDATE() as fee_charge_date')
      ,DB::raw('max(transaction_masters.transaction_date) as transaction_date')
      ,DB::raw('max(transaction_masters.fees_month) as  fees_month')
      ,DB::raw('max(transaction_masters.fees_year) as fees_year')
      ,DB::raw('month(CURDATE()) as currmonth')
      ,DB::raw('year(CURDATE()) as curryear')
      ,DB::raw('max(transaction_details.amount) as amount')
      ,DB::raw('DAY(LAST_DAY(max(transaction_masters.transaction_date))) as DaysInMonth')
      ,DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE()) as monthDiff')
      )
      -> groupBy('transaction_masters.student_course_registration_id','courses.full_name','student_course_registrations.ledger_id','ledgers.ledger_name')
      ->get(); 
      
    
       return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function save_all_student_monthly_fees_charge($orgID)
    {
       

        DB::beginTransaction();
        try{
           
            // fatching all student due fees charge
            $result = TransactionMaster::
            join('transaction_details', 'transaction_details.transaction_master_id', '=', 'transaction_masters.id')
            ->join('student_course_registrations', 'student_course_registrations.id', '=', 'transaction_masters.student_course_registration_id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->where('transaction_details.ledger_id','=',9)
            ->where('courses.fees_mode_type_id','=',1)
            ->where('transaction_masters.organisation_id', '=', $orgID)
            ->having(DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE())'),'>',0)
            ->orderBy('transaction_masters.fees_month','desc')
            ->select('transaction_masters.student_course_registration_id'
            ,DB::raw('student_course_registrations.ledger_id as student_id')
            ,'ledgers.ledger_name'
            ,'courses.full_name'
            ,DB::raw('CURDATE() as fee_charge_date')
            ,DB::raw('max(transaction_masters.transaction_date) as transaction_date')
            ,DB::raw('max(transaction_masters.fees_month) as  fees_month')
            ,DB::raw('max(transaction_masters.fees_year) as fees_year')
            ,DB::raw('month(CURDATE()) as currmonth')
            ,DB::raw('year(CURDATE()) as curryear')
            ,DB::raw('max(transaction_details.amount) as amount')
            ,DB::raw('DAY(LAST_DAY(max(transaction_masters.transaction_date))) as DaysInMonth')
            ,DB::raw('TIMESTAMPDIFF(MONTH, max(transaction_masters.transaction_date), CURDATE()) as monthDiff')
            )
            -> groupBy('transaction_masters.student_course_registration_id','courses.full_name','student_course_registrations.ledger_id','ledgers.ledger_name')
            ->get(); 
            //saving transaction master
        foreach($result as $x){
            for($y=0;$y<$x->monthDiff;$y++){
               $nextMonth=(($x->fees_month)+($y+1));
            //---------------------- Generate Transaction NO ----------------
            $result_array=array();
            $accounting_year = get_accounting_year($x->transaction_date);
            $voucher="Fees Charged";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='FEES';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;
        //------------------------------ End of code ---------------------
      /*   $current = Carbon::create($x->transaction_date);
        $tranNextDate = $current->addDays($x->DaysInMonth); */
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $x->fee_charge_date;
            $transaction_master->student_course_registration_id = $x->student_course_registration_id;
            $transaction_master->comment = "Auto geneate fees";
            $transaction_master->fees_year = $x->curryear;
            $transaction_master->fees_month =$nextMonth;
            $transaction_master->organisation_id = $orgID;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            /* foreach($input_transaction_details as $transaction_detail){ */
                //$detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = 9;
                $td->transaction_type_id = 2;
                $td->amount = $x->amount;
                $td->save();
                $transaction_details[]=$td;
            //} 
           // $detail = (object)$transaction_detail;
                $td1 = new TransactionDetail();
                $td1->transaction_master_id = $transaction_master->id;
                $td1->ledger_id = $x->student_id;
                $td1->transaction_type_id = 1;
                $td1->amount = $x->amount;
                $td1->save();
                $transaction_details1[]=$td1;
        }
    }
            $result_array['transaction_details']=$transaction_details1;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        //return response()->json(['success'=>1,'monthly_fees_charged_count'=>$monthly_fees_charged_count,'notional_monthly_fees_charge_count'=>$notional_monthly_fees_charge_count,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    }
}
