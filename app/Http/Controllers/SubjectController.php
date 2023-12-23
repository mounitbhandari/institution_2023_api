<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SubjecToCourse;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_subject_to_course($orgID)
    {
        $result = DB::select("select subjec_to_courses.id,
        courses.full_name,
        subjects.subject_full_name,
        subjec_to_courses.organisation_id
        from subjec_to_courses
        inner join courses ON courses.id = subjec_to_courses.course_id
        inner join subjects ON subjects.id = subjec_to_courses.subject_id
        where subjec_to_courses.organisation_id='$orgID'");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
       
    }
    public function save_subject_to_course(Request $request){
        $input=($request->json()->all());
        $input_subject_details=($input['subjectDetails']);
        $subject_details=array();
        foreach($input_subject_details as $subject_detail){
            $detail = (object)$subject_detail;
            $td = new SubjecToCourse();
            $td->course_id = $detail->courseId;
            $td->subject_id = $detail->subjectId;
            $td->organisation_id = $detail->organisationId;
            $td->save();
            $subject_details[]=$td;
        }
        $result_array['subject_details']=$subject_details;
        return response()->json(['success'=>1,'data'=>$result_array], 200,[],JSON_NUMERIC_CHECK);
    }
    public function index($orgID)
    {
        $result = DB::select("select id,
        subject_code,
        subject_short_name,
        subject_full_name,
        subject_description
        FROM subjects
        where organisation_id='$orgID'
        order by id desc");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveSubject(Request $request)
    {
        $subject = new Subject();
        $subject->subject_code=$request->input('subjectCode');
        $subject->subject_short_name=$request->input('subjectShortName');
        $subject->subject_full_name=$request->input('subjectFullName');
        $subject->subject_duration=$request->input('subjectDuration');
        $subject->duration_type_id=$request->input('durationTypeId');
        $subject->subject_description=$request->input('subjectDescription');
        $subject->organisation_id=$request->input('organisationId');
        $subject->save();

        return response()->json(['success'=>1,'data'=>$subject], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
