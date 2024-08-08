<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CustomVoucher;
use App\Models\Ledger as Student;
use App\Models\StudentCourseRegistration;
use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;

class StudentCourseRegistrationController extends Controller
{
    public function get_total_active_student($orgID)
    {
        $result = DB::select("select count(*) as totalActiveStudent from student_course_registrations
        where is_completed=0 and student_course_registrations.organisation_id='$orgID'");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_total_monthly_active_student($orgID)
    {
         $result = DB::select("select count(*) as totalMonthlyStudent from student_course_registrations
        inner join courses ON courses.id = student_course_registrations.course_id
        where student_course_registrations.is_completed=0
        and courses.fees_mode_type_id=1 and student_course_registrations.organisation_id='$orgID'");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_total_full_course_active_student($orgID)
    {
        $result = DB::select("select count(*) as totalFullCourseStudent from student_course_registrations
        inner join courses ON courses.id = student_course_registrations.course_id
        where student_course_registrations.is_completed=0
        and courses.fees_mode_type_id=2 and student_course_registrations.organisation_id='$orgID'");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getStudentToCourseRegistrationDetails(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        /* ---------------------------------- */
        $result = DB::table('student_course_registrations')
        ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
        ->where('student_course_registrations.ledger_id', '=', $id)
        ->where('student_course_registrations.organisation_id', '=', $orgID)
        ->select('courses.full_name','student_course_registrations.effective_date',
        DB::raw('if(student_course_registrations.is_completed,"Completed","Not Completed") as is_completed')
        ) ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getCourseDetailsById(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');

        $result = DB::select("select courses.fees_mode_type_id, 
        fees_mode_types.fees_mode_type_name,
        courses.course_code,
        courses.short_name,
        courses.full_name,
        courses.course_duration,
        courses.description,
        courses.duration_type_id,
        duration_types.duration_name,
        if(table1.id,table1.id,0) as course_fees_id,
         if(table1.fees_amount,table1.fees_amount,0) as fees_amount 
        from courses
        inner join duration_types ON duration_types.id = courses.duration_type_id
        inner join fees_mode_types ON fees_mode_types.id = courses.fees_mode_type_id
        left outer join (select id, course_id, fees_amount from course_fees where inforce='1') as table1
        on table1.course_id=courses.id
       where courses.id='$id' AND courses.organisation_id ='$orgID'");
       
         /* $result = DB::select("select courses.fees_mode_type_id, 
         fees_mode_types.fees_mode_type_name,
         courses.course_code,
         courses.short_name,
         courses.full_name,
         courses.course_duration,
         courses.description,
         courses.duration_type_id,
         duration_types.duration_name,
         if(course_fees.fees_amount,course_fees.fees_amount,0) as fees_amount
         from courses
         inner join duration_types ON duration_types.id = courses.duration_type_id
         inner join fees_mode_types ON fees_mode_types.id = courses.fees_mode_type_id
         left outer join course_fees on course_fees.course_id = courses.id
        where courses.id = '$id' AND courses.organisation_id ='$orgID'"); */

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        /* ---------------------------------- */
       /*  $result = DB::table('courses')
        ->where('courses.id', '=', $id)
        ->where('courses.organisation_id', '=', $orgID)
        ->select('fees_mode_type_id') ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK); */
    }
    public function getFeesModeTypeById(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');
        /* ---------------------------------- */
        $result = DB::table('courses')
        ->where('courses.id', '=', $id)
        ->where('courses.organisation_id', '=', $orgID)
        ->select('fees_mode_type_id') ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function index($comID)
    {
        $courseRegistration= StudentCourseRegistration::where('organisation_id','=',$comID)->get();
        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getCourseIdByStudentToCourseRegistrationId(Request $request)
    {
        $orgID = $request->input('organisationId');
        $id = $request->input('id');
        /* ---------------------------------- */
        $courseRegistration= DB::table('student_course_registrations')
        ->where('student_course_registrations.id', '=', $id)
        ->where('student_course_registrations.organisation_id', '=', $orgID)
        ->select('student_course_registrations.ledger_id', 
        'student_course_registrations.course_id') ->get();
        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getRegisterStudent($orgID)
    {
        //$courseRegistration= StudentCourseRegistration::get();
         $result = DB::select("select student_course_registrations.ledger_id as studentId,
         ledgers.ledger_name as studentName,ledgers.qualification
         from student_course_registrations
         inner join ledgers on ledgers.id = student_course_registrations.ledger_id
         where student_course_registrations.organisation_id='$orgID' and ledgers.is_student=1 and student_course_registrations.is_completed=0
         group by student_course_registrations.ledger_id,ledgers.ledger_name,ledgers.qualification"); 

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getAdvRegisterStudent($orgID)
    {
        //$courseRegistration= StudentCourseRegistration::get();
         $result = DB::select("select student_course_registrations.ledger_id as studentId,
         ledgers.ledger_name as studentName,ledgers.qualification
         from student_course_registrations
         inner join ledgers on ledgers.id = student_course_registrations.ledger_id
         inner join courses ON courses.id = student_course_registrations.course_id
         where student_course_registrations.organisation_id='$orgID' and ledgers.is_student=1 and student_course_registrations.is_completed=0
         and courses.fees_mode_type_id=1
         group by student_course_registrations.ledger_id,ledgers.ledger_name,ledgers.qualification"); 

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getStudentToCourseRegistration($orgID)
    {
        $result = DB::select("select distinct ledgers.ledger_name,
        courses.full_name,
        transaction_masters.id as transaction_masters_id,
        student_course_registrations.id,
        student_course_registrations.ledger_id,
        student_course_registrations.course_id,
        student_course_registrations.base_fee,
        student_course_registrations.discount_allowed,
        student_course_registrations.joining_date,
        student_course_registrations.effective_date,
        student_course_registrations.completion_date, 
        student_course_registrations.actual_course_duration,
        student_course_registrations.duration_type_id,
        student_course_registrations.is_started,
        student_course_registrations.is_completed,
        student_course_registrations.organisation_id
        from student_course_registrations
        inner join transaction_masters on transaction_masters.student_course_registration_id = student_course_registrations.id
        inner join courses ON courses.id = student_course_registrations.course_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where student_course_registrations.organisation_id='$orgID' and transaction_masters.is_course_fees=1 and student_course_registrations.is_completed=0
        order by transaction_masters.created_at desc"); 
        //$courseRegistration= StudentCourseRegistration::get();
        /*  $result = DB::table('student_course_registrations')
            ->join('transaction_masters', 'transaction_masters.student_course_registration_id', '=', 'student_course_registrations.id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->where('student_course_registrations.organisation_id', '=', $orgID)
            ->orderBy('student_course_registrations.id','desc')
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            DB::raw('transaction_masters.id as transaction_masters_id'),
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'ledgers.ledger_name',
            'courses.full_name',
            'student_course_registrations.base_fee'
             )->distinct()->get(); */ 

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getStudentToCourseRegistrationById(Request $request)
    {
        $ledgerId = $request->input('ledger_id');
        $orgID = $request->input('organisationId');
        /* ---------------------------------- */
        //$courseRegistration= StudentCourseRegistration::get();
        $result = DB::table('student_course_registrations')
            ->join('transaction_masters', 'transaction_masters.student_course_registration_id', '=', 'student_course_registrations.id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->where('student_course_registrations.ledger_id', '=', $ledgerId)
            ->where('student_course_registrations.organisation_id', '=', $orgID)
            ->where('student_course_registrations.is_completed', '=', 0)
            ->where('student_course_registrations.is_started', '=', 1)
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            'courses.full_name'
              )
              ->distinct()->get(); 
           /*  $result = DB::table('student_course_registrations')
            ->join('transaction_masters', 'transaction_masters.student_course_registration_id', '=', 'student_course_registrations.id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->join('duration_types', 'duration_types.id', '=', 'student_course_registrations.duration_type_id')
            ->where('student_course_registrations.ledger_id', '=', $ledgerId)
            ->where('student_course_registrations.organisation_id', '=', $orgID)
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            DB::raw('transaction_masters.id as transaction_masters_id'),
            'ledgers.ledger_name',
            'ledgers.billing_name',
            'courses.course_code',
            'courses.short_name',
            'courses.full_name',
            'student_course_registrations.base_fee',
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'duration_types.duration_name'
               )->distinct()
            ->get(); */
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function update_course_completed_ById($id){
        //$id=$request->input('id');
        $entryDate=Carbon::now()->format('Y-m-d');
        $courseRegistration=StudentCourseRegistration::findOrFail($id);
        $courseRegistration->is_completed=1;
        $courseRegistration->completion_date=$entryDate;
        $courseRegistration->save();
        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function is_student_to_course_exists(Request $request)
    {
        $input=($request->json()->all());
        $ledgerId = $request->input('ledgerId');
        $organisationId = $request->input('organisationId');
        $courseId = $request->input('courseId');
        $existsId=StudentCourseRegistration::where('course_id', $courseId)
                                            ->where('ledger_id', $ledgerId)
                                            ->where('is_completed', 0)
                                            ->where('organisation_id', $organisationId)->exists();
        if($existsId){
            $result = DB::select("Update student_course_registrations set is_completed=1, completion_date=CURDATE()
            WHERE ledger_id = ' $ledgerId' AND course_id = '$courseId' AND is_completed = 0");
           }
       
    }
    public function store(Request $request)
    {
         $input=($request->json()->all());
         // if any exists with same LEDGER ID, COURSE ID AND ORGANISATION ID then make course as compeleted 1
         $ledgerId = $request->input('studentId');
         $organisationId = $request->input('organisationId');
         $courseId = $request->input('courseId');
         $existsId=StudentCourseRegistration::where('course_id', $courseId)
                                             ->where('ledger_id', $ledgerId)
                                             ->where('is_completed', 0)
                                             ->where('organisation_id', $organisationId)->exists();
         if($existsId){
             $result = DB::select("Update student_course_registrations set is_completed=1, completion_date=CURDATE()
             WHERE ledger_id = ' $ledgerId' AND course_id = '$courseId' AND organisation_id='$organisationId'  AND is_completed = 0");
            }
         //**************** End of Code ******************/
        //$input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        $rules = array(
            'courseId' => 'bail|required|exists:courses,id',
            'baseFee' => 'bail|required|integer|gt:0',
            'discountAllowed'=>'lt:baseFee',
            'effectiveDate' => 'bail|required|date_format:Y-m-d',
            'studentId' => ['bail','required','exists:ledgers,id',
                            function($attribute, $value, $fail){
                                $student=Student::where('id', $value)->where('is_student','=',1)->first();
                                if(!$student){
                                    $fail($value.' is not a valid student id');
                                }
                            }],
        );
        $messages = array(
            'courseId.required'=> 'Course ID is required', // custom message
            'courseId.exists'=> 'This course ID does not exists', // custom message
            'studentId.required'=> 'You have to input student ID', // custom message
            'studentId.exists'=> 'This student does not exists', // custom message
            'discountAllowed.lt'=> 'Discount should be lower than the Base Price' // custom message
        );

        $validator = Validator::make($request->all(),$rules,$messages );

        if ($validator->fails()) {
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        $courseId = $request->input('courseId');
        $courseCode = Course::findOrFail($courseId)->course_code;
        if($request->has('joiningDate')) {
            $joiningDate = $request->input('joiningDate');
        }else{
            $joiningDate=Carbon::now()->format('Y-m-d');
        }
        DB::beginTransaction();

        try{
            $temp_date = explode("-",$joiningDate);
            if($temp_date[1]>3){
                $x = $temp_date[0]%100;
                $accounting_year = $x*100 + ($x+1);
            }else{
                $x = $temp_date[0]%100;
                $accounting_year =($x-1)*100+$x;
            }
            $voucher="StudentCourseRegistration";
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
                $customVoucher->prefix='CODER';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,3,"0",STR_PAD_LEFT);
            //creating reference number
            $reference_number = $courseCode.''.$counter."@".$accounting_year;
           
            // if any record is failed then whole entry will be rolled back
            //try portion execute the commands and catch execute when error.
            $courseRegistration= new StudentCourseRegistration();
            $courseRegistration->reference_number = $reference_number;
            $courseRegistration->ledger_id = $request->input('studentId');
            $courseRegistration->course_id= $request->input('courseId');
            $courseRegistration->base_fee= $request->input('baseFee');
            $courseRegistration->discount_allowed= $request->input('discountAllowed');
            $courseRegistration->joining_date= $joiningDate;
            $courseRegistration->effective_date= $request->input('effectiveDate');
            $courseRegistration->actual_course_duration= $request->input('actual_course_duration');
            $courseRegistration->duration_type_id= $request->input('duration_type_id');
            $courseRegistration->organisation_id=$request->input('organisationId');
            $courseRegistration->section=$request->input('section');
            $courseRegistration->is_started= $request->input('isStarted');
            $courseRegistration->save();

            //---------------------------------------------------------
            $result_array=array();
            $accounting_year = get_accounting_year($joiningDate);
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
             $transaction_master->transaction_date =  $joiningDate;
             $transaction_master->student_course_registration_id = $courseRegistration->id;
             $transaction_master->comment = 'Course Registration';
             $transaction_master->fees_year = $request->input('feesYear');
             $transaction_master->fees_month = $request->input('feesMonth');
             $transaction_master->organisation_id=$request->input('organisationId');
             $transaction_master->is_course_fees= 1;
             $transaction_master->save();
             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount-$request->input('discountAllowed');
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function update(Request $request)
    {
        $input=($request->json()->all());
        $input_transaction_details=($input['transactionDetails']);

        if($request->has('joiningDate')) {
            $joiningDate = $request->input('joiningDate');
        }else{
            $joiningDate=Carbon::now()->format('Y-m-d');
        }
       
        $transactionMasterID=$request->input('transactionMasterId');

          // ------ delete record ---------
          $tran_details=TransactionDetail::where('transaction_master_id',$transactionMasterID)->delete();
          if(!$tran_details){
              return response()->json(['success'=>1,'data'=>'Sorry Data Not Deleted:'.$transactionMasterID], 200,[],JSON_NUMERIC_CHECK);
          }

        $studentCourseRegistrations= new StudentCourseRegistration();
        $studentCourseRegistrations= StudentCourseRegistration::find($request->input('studentToCourseID'));
        $studentCourseRegistrations->ledger_id=$request->input('studentId');
        $studentCourseRegistrations->course_id=$request->input('courseId');
        $studentCourseRegistrations->base_fee=$request->input('baseFee');
        $studentCourseRegistrations->discount_allowed=$request->input('discountAllowed');
        $studentCourseRegistrations->joining_date=$joiningDate;
        $studentCourseRegistrations->effective_date=$request->input('effectiveDate');
        $studentCourseRegistrations->actual_course_duration=$request->input('actual_course_duration');
        $studentCourseRegistrations->duration_type_id=$request->input('duration_type_id');
        $studentCourseRegistrations->section=$request->input('section');
        $studentCourseRegistrations->save();
        
       
        //------------- update code of Transaction Master  code ---------------------
        $transaction_master=TransactionMaster::find($transactionMasterID);
        
           $transaction_master->transaction_date =  $joiningDate;
           $transaction_master->fees_year = $request->input('feesYear');
           $transaction_master->fees_month = $request->input('feesMonth');
       
        $transaction_master->save();

       
         //------------- update code of Transaction Details code ---------------------
         $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transactionMasterID;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount-$request->input('discountAllowed');
                 $td->save();
                 $transaction_details[]=$td;
             }
       
            $result_array['transaction_details']=$td;

           
        return response()->json(['success'=>1,'data'=> $studentCourseRegistrations], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentCourseRegistration  $studentCourseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentCourseRegistrations= StudentCourseRegistration::find($id);
        if(!empty($studentCourseRegistrations)){
            $result = $studentCourseRegistrations->delete();
        }else{
            $result = false;
        }
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
