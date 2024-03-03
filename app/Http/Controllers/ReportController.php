<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use App\Models\CustomVoucher;
use App\Models\Ledger;
use App\Models\StudentCourseRegistration;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;
use App\Models\news;
use App\Models\Syllabus;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class ReportController extends Controller
{
    public function get_pivot_table_for_admission($orgID)
    {
        $result = DB::select("select year(effective_date) AS YEAR,
        count(CASE WHEN  month(effective_date)=1 THEN effective_date ELSE NULL END) as 'JAN',
        count(CASE WHEN  month(effective_date)=2 THEN effective_date ELSE NULL END) as 'FEB',
        count(CASE WHEN  month(effective_date)=3 THEN effective_date ELSE NULL END) as 'MAR',
        count(CASE WHEN  month(effective_date)=4 THEN effective_date ELSE NULL END) as 'APR',
        count(CASE WHEN  month(effective_date)=5 THEN effective_date ELSE NULL END) as 'MAY',
        count(CASE WHEN  month(effective_date)=6 THEN effective_date ELSE NULL END) as 'JUN',
        count(CASE WHEN  month(effective_date)=7 THEN effective_date ELSE NULL END) as 'JLY',
        count(CASE WHEN  month(effective_date)=8 THEN effective_date ELSE NULL END) as 'AUG',
        count(CASE WHEN  month(effective_date)=9 THEN effective_date ELSE NULL END) as 'SEP',
        count(CASE WHEN  month(effective_date)=10 THEN effective_date ELSE NULL END) as 'OCT',
        count(CASE WHEN  month(effective_date)=11 THEN effective_date ELSE NULL END) as 'NOV',
        count(CASE WHEN  month(effective_date)=12 THEN effective_date ELSE NULL END) as 'DEC'
       from student_course_registrations
       where student_course_registrations.organisation_id='$orgID'
      group by year(effective_date)
      order by year(effective_date) desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_student_news_list(Request $request)
    {
        $organisationId = $request->input('organisationId');
        $courseId = $request->input('courseId');
        $existsId=news::where('course_id', $courseId)->exists();
        //echo $existsId;
        //return response()->json(['success'=>1,'data'=> $existsId], 200,[],JSON_NUMERIC_CHECK);
       if ($existsId) {
            // The record exists
            $result = DB::select("select  id,
            news_description,file_url,
            inforce, 
            created_at,
            organisation_id
            from news 
            where inforce=1 and course_id='$courseId' and organisation_id='$organisationId'
            order by news.id desc limit 6");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        } else if (!$existsId){
            $result = DB::select("select  id,
            news_description,file_url,
            inforce, 
            created_at,
            organisation_id
            from news 
            where inforce=1 and organisation_id='$organisationId'
            and course_id is null order by news.id desc limit 6");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        }
        
    }
    public function get_student_syllabus_list(Request $request)
    {
        $organisationId = $request->input('organisationId');
        $courseId = $request->input('courseId');
        $existsId=Syllabus::where('course_id', $courseId)->exists();
        //echo $existsId;
        //return response()->json(['success'=>1,'data'=> $existsId], 200,[],JSON_NUMERIC_CHECK);
       if ($existsId) {
            // The record exists
            $result = DB::select("select  id,
            syllabus_description,file_url,
            inforce, 
            created_at,
            organisation_id
            from syllabi 
            where inforce=1 and course_id='$courseId' and organisation_id='$organisationId'
            order by syllabi.id desc");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        } else if (!$existsId){
            $result = DB::select("select  id,
            syllabus_description,file_url,
            inforce, 
            created_at,
            organisation_id
            from syllabi 
            where inforce=1 and organisation_id='$organisationId'
            and course_id is null order by syllabi.id desc");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        }
        
    }
    public function get_student_assignment_list(Request $request)
    {
        $organisationId = $request->input('organisationId');
        $courseId = $request->input('courseId');
        $existsId=Syllabus::where('course_id', $courseId)->exists();
        //echo $existsId;
        //return response()->json(['success'=>1,'data'=> $existsId], 200,[],JSON_NUMERIC_CHECK);
       if ($existsId) {
            // The record exists
            $result = DB::select("select assignments.id,
            assignments.assignment_description,
            assignments.file_url,
            subjects.subject_full_name ,
            if(assignments.inforce=1,'Active','Inactive') as status,
            assignments.course_id, 
            assignments.subject_id,
            assignments.uploaded_by,
            assignments.user_id,
            assignments.organisation_id,
            assignments.created_at
            from assignments
            inner join subjects ON subjects.id = assignments.subject_id
            where assignments.inforce=1 and assignments.course_id='$courseId' and assignments.organisation_id='$organisationId'
            order by assignments.id desc");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        } else if (!$existsId){
            $result = DB::select("select assignments.id,
            assignments.assignment_description,
            assignments.file_url,
            subjects.subject_full_name ,
            if(assignments.inforce=1,'Active','Inactive') as status,
            assignments.course_id, 
            assignments.subject_id,
            assignments.uploaded_by,
            assignments.user_id,
            assignments.organisation_id,
            assignments.created_at
            from assignments
            inner join subjects ON subjects.id = assignments.subject_id
            where assignments.inforce=1 and assignments.organisation_id='$organisationId'
            and assignments.course_id is null order by assignments.id desc");
            
            return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
        }
        
    }
    public function update_news_statusById(Request $request){
        $id=$request->input('id');
        //echo 'Id'.$id;
        $news=news::findOrFail($id);
        $news->inforce=$request->input('inforce');
            //echo 'inforce'.$studentToCourse->inforce;
        
        $news->save();
        return response()->json(['success'=>1,'data'=> $news], 200,[],JSON_NUMERIC_CHECK);
        
    }
    public function get_all_news_list($id)
    {
        $result = DB::select("select  id,
        news_description,file_url,
        inforce, 
        if(inforce=1,'Active','Inactive') as status,
        created_at,
        organisation_id
        from news 
        where organisation_id='$id'
        order by news.id desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_all_syllabus_list($id)
    {
        $result = DB::select("select  id,
        syllabus_description,
        file_url,
        inforce, 
        if(inforce=1,'Active','Inactive') as status,
        created_at,
        organisation_id
        from syllabi 
        where organisation_id='$id'
        order by syllabi.id desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_all_assignment_list($id)
    {
        $result = DB::select("select assignments.id,
        assignments.assignment_description,
        assignments.file_url,
        subjects.subject_full_name ,
        if(assignments.inforce=1,'Active','Inactive') as status,
        assignments.course_id, 
        assignments.subject_id,
        assignments.uploaded_by,
        assignments.user_id,
        assignments.organisation_id,
        assignments.created_at
        from assignments
        inner join subjects ON subjects.id = assignments.subject_id
        where assignments.organisation_id='$id'
        order by assignments.id desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function file_upload(Request $request){
        $news= new news();
        if(($request->hasFile('image')) && ($request->input('courseId')) && ($request->input('newsDescription'))){
            //dd("It is working...");
            $completeFileName=$request->file('image')->getClientOriginalName();
            $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
            //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
            $path = $request->file('image')->move(public_path("/file_upload"), $compPic);
            //return $this->successResponse($request->file('image'));

            $news ->news_description = $request->input('newsDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->file_url=$compPic;
            $news->save();
            return response()->json(['success'=>1,'data'=> "File Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->hasFile('image')) && ($request->input('newsDescription'))){
             //dd("It is working...");
             $completeFileName=$request->file('image')->getClientOriginalName();
             $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
             $extension=$request->file('image')->getClientOriginalExtension();
             $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
             //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
             $path = $request->file('image')->move(public_path("/file_upload"), $compPic);
             //return $this->successResponse($request->file('image'));
 
             $news ->news_description = $request->input('newsDescription');
             $news->organisation_id=$request->input('organisationId');
             $news->file_url=$compPic;
             $news->save();
             return response()->json(['success'=>1,'data'=> "File Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->input('courseId')) && ($request->input('newsDescription'))){
            $news ->news_description = $request->input('newsDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->save();
            return response()->json(['success'=>1,'data'=> "File Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else{
            $news ->news_description = $request->input('newsDescription');
            $news->organisation_id=$request->input('organisationId');
            $news->save();
            return response()->json(['success'=>1,'data'=> "File Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
    }
    public function syllabus_upload(Request $request){
        $news= new Syllabus();
        if(($request->hasFile('image')) && ($request->input('courseId')) && ($request->input('syllabusDescription'))){
            //dd("It is working...");
            $completeFileName=$request->file('image')->getClientOriginalName();
            $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
            //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
            $path = $request->file('image')->move(public_path("/syllabus_upload"), $compPic);
            //return $this->successResponse($request->file('image'));

            $news ->syllabus_description = $request->input('syllabusDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->file_url=$compPic;
            $news->save();
            return response()->json(['success'=>1,'data'=> "Syllabus Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->hasFile('image')) && ($request->input('syllabusDescription'))){
             //dd("It is working...");
             $completeFileName=$request->file('image')->getClientOriginalName();
             $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
             $extension=$request->file('image')->getClientOriginalExtension();
             $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
             //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
             $path = $request->file('image')->move(public_path("/syllabus_upload"), $compPic);
             //return $this->successResponse($request->file('image'));
 
             $news ->syllabus_description = $request->input('syllabusDescription');
             $news->organisation_id=$request->input('organisationId');
             $news->file_url=$compPic;
             $news->save();
             return response()->json(['success'=>1,'data'=> "Syllabus Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->input('courseId')) && ($request->input('syllabusDescription'))){
            $news ->syllabus_description = $request->input('syllabusDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->save();
            return response()->json(['success'=>1,'data'=> "Syllabus Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else{
            $news ->syllabus_description = $request->input('syllabusDescription');
            $news->organisation_id=$request->input('organisationId');
            $news->save();
            return response()->json(['success'=>1,'data'=> "File Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
    }
    public function assignment_upload(Request $request){
        $news= new Assignment();
        if(($request->hasFile('image')) && ($request->input('courseId')) && ($request->input('subject_id')) && ($request->input('assignmentDescription'))){
            //dd("It is working...");
            $completeFileName=$request->file('image')->getClientOriginalName();
            $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
            //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
            $path = $request->file('image')->move(public_path("/assignment_upload"), $compPic);
            //return $this->successResponse($request->file('image'));

            $news ->assignment_description = $request->input('assignmentDescription');
            $news->course_id=$request->input('courseId');
            $news->subject_id=$request->input('subject_id');
            $news->organisation_id=$request->input('organisationId');
            $news->uploaded_by=$request->input('uploaded_by');
            $news->file_url=$compPic;
            $news->user_id=$request->input('user_id');
            $news->save();
            return response()->json(['success'=>1,'data'=> "Assignment Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->hasFile('image')) && ($request->input('assignmentDescription'))){
             //dd("It is working...");
             $completeFileName=$request->file('image')->getClientOriginalName();
             $fileNameOnly=pathinfo($completeFileName,PATHINFO_FILENAME);
             $extension=$request->file('image')->getClientOriginalExtension();
             $compPic=str_replace('','_', $fileNameOnly). '_'. rand(). '_'.time(). '.' . $extension;
             //$path=$request->file('image')->storeAs('public/file_upload',$compPic);
             $path = $request->file('image')->move(public_path("/assignment_upload"), $compPic);
             //return $this->successResponse($request->file('image'));
 
             $news ->assignment_description = $request->input('assignmentDescription');
             $news->organisation_id=$request->input('organisationId');
             $news->uploaded_by=$request->input('uploaded_by');
             $news->file_url=$compPic;
             $news->user_id=$request->input('user_id');
             $news->save();
             return response()->json(['success'=>1,'data'=> "Assignment Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else if(($request->input('courseId')) && ($request->input('assignmentDescription'))){
            $news ->assignment_description = $request->input('assignmentDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->uploaded_by=$request->input('uploaded_by');
            $news->user_id=$request->input('user_id');
            $news->save();
            return response()->json(['success'=>1,'data'=> "Assignment Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
        else{
            $news ->assignment_description = $request->input('assignmentDescription');
            $news->organisation_id=$request->input('organisationId');
            $news->uploaded_by=$request->input('uploaded_by');
            $news->user_id=$request->input('user_id');
            $news->save();
            return response()->json(['success'=>1,'data'=> "Assignment Uploaded Successfully"], 200,[],JSON_NUMERIC_CHECK);
        }
    }
    public function news_save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'news_description' => 'required|max:1000|unique:news,news_description',
            ]);
        DB::beginTransaction();

       try{
         

           // if any record is failed then whole entry will be rolled back
           //try portion execute the commands and catch execute when error.
            $news= new news();
           
            $news ->news_description = $request->input('newsDescription');
            $news->course_id=$request->input('courseId');
            $news->organisation_id=$request->input('organisationId');
            $news->save();
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
          return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
            //return $this->errorResponse($e->getMessage());
        }
        return response()->json(['success'=>1,'data'=>$news], 200,[],JSON_NUMERIC_CHECK);

    }
    //
    public function get_all_income_report($orgID){
        $result = DB::select("select get_curr_month_total_cash(id) as total_monthly_cash, 
        get_curr_month_total_bank(id) as total_monthly_bank,
        get_curr_year_total_cash(id) as total_yearly_cash,
        get_curr_year_total_bank(id) as total_yearly_bank,
        get_curr_month_total_cash(id)+get_curr_month_total_bank(id) as total_monthly_income,
        get_curr_year_total_cash(id)+get_curr_year_total_bank(id) as total_yearly_income
    from organisations where id='$orgID'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_birthday_report($orgID)
    {
       
         $result=DB::table('ledgers')
         ->where('ledgers.organisation_id', '=', $orgID)
        ->where(DB::raw('day(dob)'),'>=',DB::raw('day(current_date())'))
        ->where(DB::raw('month(dob)'),'=',DB::raw('month(current_date())'))
        ->orderBy(DB::raw('day(current_date())- day(dob)'),'DESC')
        ->select('ledgers.ledger_name',
        'ledgers.guardian_contact_number',
        'ledgers.whatsapp_number',
        'ledgers.dob',
        DB::raw('day(current_date()) as sysday'),
        DB::raw('day(dob) as birthDay'),
        DB::raw('day(dob) - day(current_date()) as PandingDays')
         )
         ->get();

         return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
         //--------------------------------------------
        
    }
    public function get_upcoming_due_list_report($orgID)
    {
        $result = DB::select("select ledgers.ledger_name as student_name,ledgers.whatsapp_number,
        courses.full_name,
        trans_master2.student_course_registration_id, 
        max(table1.transaction_date) as transaction_date, 
        datediff(curdate(),max(table1.transaction_date)) as date_Diff,
        get_total_due_by_student_registration_id(trans_master2.student_course_registration_id) as total_due
             from transaction_masters trans_master1,transaction_masters trans_master2
        inner join (select transaction_masters.id,
                          transaction_masters.transaction_number,
                          transaction_masters.transaction_date,
                          transaction_masters.created_at,
                          transaction_details.ledger_id,
                          ledgers.ledger_name,
                          transaction_details.amount as temp_total_received from transaction_masters
                          inner join transaction_details on transaction_details.transaction_master_id = transaction_masters.id
                          inner join ledgers ON ledgers.id = transaction_details.ledger_id
                          where transaction_masters.voucher_type_id=4
                          and transaction_details.transaction_type_id=1 and transaction_details.ledger_id not in(22)) as table1
        inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
        inner join courses ON courses.id = student_course_registrations.course_id
        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
        where trans_master1.reference_transaction_master_id=trans_master2.id
        and table1.id = trans_master1.id and trans_master2.organisation_id='$orgID'
        group by trans_master2.student_course_registration_id,courses.full_name,ledgers.ledger_name,ledgers.whatsapp_number
        having datediff(curdate(),max(table1.transaction_date))>24
        and get_total_due_by_student_registration_id(trans_master2.student_course_registration_id)>0
       order by datediff(curdate(),max(table1.transaction_date)) desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_to_course_registration_report($orgID)
    {
        //$courseRegistration= StudentCourseRegistration::get();
         $result = DB::table('student_course_registrations')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->where('student_course_registrations.organisation_id', '=', $orgID)
            ->where('ledgers.is_student', '=', 1)
            ->orderBy('student_course_registrations.id','desc')
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'ledgers.ledger_name',
            'courses.full_name',
            'ledgers.whatsapp_number',
            DB::raw('if(student_course_registrations.is_completed,"Completed","Not Completed") as is_completed'),
            DB::raw('get_total_course_fees_by_studentregistration(student_course_registrations.id) as total_course_fees'),
            DB::raw('get_total_received_by_studentregistration(student_course_registrations.id) as total_received'),
            DB::raw('get_total_due_by_student_registration_id(student_course_registrations.id) as total_due')
             )
            ->get(); 

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_student_to_course_registration_report_by_ledger_id($ledgerId)
    {
        //$courseRegistration= StudentCourseRegistration::get();
         $result = DB::table('student_course_registrations')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->where('ledgers.id', '=', $ledgerId)
            ->where('ledgers.is_student', '=', 1)
            ->orderBy('student_course_registrations.id','desc')
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'ledgers.ledger_name',
            'courses.full_name',
            'ledgers.whatsapp_number',
            DB::raw('if(student_course_registrations.is_completed,"Completed","Not Completed") as is_completed'),
            DB::raw('get_total_course_fees_by_studentregistration(student_course_registrations.id) as total_course_fees'),
            DB::raw('get_total_received_by_studentregistration(student_course_registrations.id) as total_received'),
            DB::raw('get_total_due_by_student_registration_id(student_course_registrations.id) as total_due')
             )
            ->get(); 

        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_all_income_list_report(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $orgID = $request->input('organisationId');
        //$id = $request->input('id');

        //echo $ledgerId;
        $result = DB::select("select ledgers.ledger_name as student_name,
        ledgers.whatsapp_number,
                courses.full_name,
                trans_master2.student_course_registration_id, 
                        trans_master1.id as transaction_master_id,
                        trans_master1.reference_transaction_master_id,
                        trans_master1.comment,
                        table1.transaction_number,
                        table1.transaction_date, 
                        table1.ledger_id,
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
                                          and transaction_details.transaction_type_id=1 and transaction_details.ledger_id not in(22)) as table1
                        inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
                        inner join courses ON courses.id = student_course_registrations.course_id
                        inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                        where trans_master1.reference_transaction_master_id=trans_master2.id
                        and table1.id = trans_master1.id and table1.ledger_id not in (11)
                        and table1.transaction_date between '$startDate' and '$endDate'
                        and trans_master2.organisation_id='$orgID'");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_pivot_table_income_list_report($orgID)
    {
       $result = DB::select("select YEAR(table1.transaction_date) AS YEAR, 
        SUM(CASE WHEN  month(table1.transaction_date)=1 THEN table1.received_amount ELSE 0 END) as 'JAN',
        SUM(CASE WHEN  month(table1.transaction_date)=2 THEN table1.received_amount ELSE 0 END) as 'FEB',
        SUM(CASE WHEN  month(table1.transaction_date)=3 THEN table1.received_amount ELSE 0 END) as 'MAR',
        SUM(CASE WHEN  month(table1.transaction_date)=4 THEN table1.received_amount ELSE 0 END) as 'APR',
        SUM(CASE WHEN  month(table1.transaction_date)=5 THEN table1.received_amount ELSE 0 END) as 'MAY',
        SUM(CASE WHEN  month(table1.transaction_date)=6 THEN table1.received_amount ELSE 0 END) as 'JUN',
        SUM(CASE WHEN  month(table1.transaction_date)=7 THEN table1.received_amount ELSE 0 END) as 'JLY',
        SUM(CASE WHEN  month(table1.transaction_date)=8 THEN table1.received_amount ELSE 0 END) as 'AUG',
        SUM(CASE WHEN  month(table1.transaction_date)=9 THEN table1.received_amount ELSE 0 END) as 'SEP',
        SUM(CASE WHEN  month(table1.transaction_date)=10 THEN table1.received_amount ELSE 0 END) as 'OCT',
        SUM(CASE WHEN  month(table1.transaction_date)=11 THEN table1.received_amount ELSE 0 END) as 'NOV',
        SUM(CASE WHEN  month(table1.transaction_date)=12 THEN table1.received_amount ELSE 0 END) as 'DEC'
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
                                                and transaction_details.transaction_type_id=1 and transaction_details.ledger_id not in(22)) as table1
                              inner join student_course_registrations ON student_course_registrations.id = trans_master2.student_course_registration_id
                              inner join courses ON courses.id = student_course_registrations.course_id
                              inner join ledgers ON ledgers.id = student_course_registrations.ledger_id
                              where trans_master1.reference_transaction_master_id=trans_master2.id
                              and table1.id = trans_master1.id and table1.ledger_id not in (11)
                              and trans_master2.organisation_id='$orgID'
                              GROUP BY YEAR(table1.transaction_date)
                              ORDER BY YEAR(table1.transaction_date) desc");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
}
