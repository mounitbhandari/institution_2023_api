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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ReportController extends Controller
{
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
}
