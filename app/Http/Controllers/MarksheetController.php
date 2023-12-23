<?php

namespace App\Http\Controllers;

use App\Models\Marksheet;
use App\Http\Requests\StoreMarksheetRequest;
use App\Http\Requests\UpdateMarksheetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function get_mark_students($orgID)
    {
        $result = DB::select("select id,
        ledger_name
        from ledgers
        where is_student=1 
        and organisation_id='$orgID'
        order by id desc");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
     
    }

    public function get_subjects_by_course_id($couseID)
    {
        $result = DB::select("select subjec_to_courses.subject_id,
        subjects.subject_full_name
        from subjec_to_courses
        inner join subjects ON subjects.id = subjec_to_courses.subject_id
        where course_id='$couseID' 
        order by subjec_to_courses.subject_id");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
     
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
     * @param  \App\Http\Requests\StoreMarksheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //
        $input=($request->json()->all());
        $input_marks_details=($input['marksDetails']);
        DB::beginTransaction();

       try{
        $marks_details=array();
        foreach($input_marks_details as $marks_detail){
                $detail = (object)$marks_detail;
                $td = new Marksheet();
                $td ->ledger_id = $detail->ledgerId;
                $td->course_id = $detail->courseId;
                $td->subject_id = $detail->subjectId;
                $td->total_marks = $detail->totalMarks;
                $td->obtain_marks = $detail->obtainMarks;
                $td->exam_id = $detail->examId;
                $td->exam_categories_id = $detail->examCategoriesId;
                $td->session_id = $detail->sessionId;
                $td->organisation_id = $detail->organisationId;
                $td->save();
                $marks_details[]=$td;
            }
            $result_array['marks_details']=$marks_details;
        
            DB::commit(); 

        }catch(\Exception $e){
            DB::rollBack();
          return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
            //return $this->errorResponse($e->getMessage());
        }
        return response()->json(['success'=>1,'data'=>$result_array], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marksheet  $marksheet
     * @return \Illuminate\Http\Response
     */
    public function show(Marksheet $marksheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marksheet  $marksheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Marksheet $marksheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarksheetRequest  $request
     * @param  \App\Models\Marksheet  $marksheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarksheetRequest $request, Marksheet $marksheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marksheet  $marksheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marksheet $marksheet)
    {
        //
    }
}
