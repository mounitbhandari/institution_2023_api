<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CourseController extends ApiController
{

    public function get_last_course($orgID)
    {
        $result = $result = DB::select("select courses.id,
        courses.fees_mode_type_id, 
        courses.course_code, 
        courses.short_name, 
        courses.full_name, 
        courses.course_duration, 
        courses.description, 
        courses.duration_type_id, 
        courses.inforce, 
        courses.organisation_id 
        from courses
        where organisation_id='$orgID'
        order by id desc
        limit 1");
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_total_course($orgID)
    {
        $result = $result = DB::select("select count(*) as totalCourse from courses where organisation_id=".$orgID);
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_total_monthly_course($orgID)
    {
        $result = $result = DB::select("select count(*) as totalMonthlyCourse from courses
        where fees_mode_type_id=1 and organisation_id=".$orgID);
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_total_full_course($orgID)
    {
        $result = $result = DB::select("select count(*) as totalFullCourse from courses
        where fees_mode_type_id=2 and organisation_id=".$orgID);
       
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function index($orgID)
    {
        $courses= Course::where('organisation_id','=',$orgID)->get();
        return response()->json(['success'=>1,'data'=> CourseResource::collection($courses)], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_course_by_id($id)
    {
        $courses= Course::findOrFail($id);
        return response()->json(['success'=>1,'data'=> new CourseResource($courses)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courseCode' => 'required|max:25|unique:course,course_name',
            'shortName' => 'required|unique:course,short_name',
            'courseDurationTypeId' => 'required|exists:course_duration_types,id',
            'description' => 'max:255',
        ]);
        DB::beginTransaction();
        try{
            $course = new Course();
            $course->fees_mode_type_id=$request->input('feesModeTypeId');
            $course->course_code=$request->input('courseCode');
            $course->short_name=$request->input('shortName');
            $course->full_name=$request->input('fullName');
            $course->course_duration=$request->input('courseDuration');
            $course->duration_type_id=$request->input('durationTypeId');
            $course->description=$request->input('description');
            $course->organisation_id=$request->input('organisationId');
            $course->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
        return response()->json(['success'=>1,'data'=>new CourseResource($course)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update(Request $request)
    {
        $course_id = $request->input('courseId');
        $validator = Validator::make($request->all(),[
            'courseCode' => ['required',Rule::unique('courses', 'course_code')->ignore($course_id), "max:20"],
            'feesModeTypeId' => "required|exists:fees_mode_types,id",
            'shortName' => "required|max:50",
            'fullName' => "required|max:50",
            'description' => "max:255",
            'durationTypeId' => "required|exists:duration_types,id"
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages());
        }

        $course = Course::findOrFail($request->input('courseId'));
        $course->course_code = $request->input('courseCode');
        $course->fees_mode_type_id = $request->input('feesModeTypeId');
        $course->short_name = $request->input('shortName');
        $course->full_name = $request->input('fullName');
        $course->duration_type_id = $request->input('durationTypeId');
        $course->course_duration = $request->input('courseDuration');
        if ($request->input('description')) {
            $course->description = $request->input('description');
        }

        $course->save();
        return $this->successResponse($course);
    }


    public function destroy(Course $course)
    {
        //
    }
}
