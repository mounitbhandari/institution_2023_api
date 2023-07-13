<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Course;
use App\Models\CourseFees;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreCourseFeesRequest;
use App\Http\Requests\UpdateCourseFeesRequest;

class CourseFeesController extends Controller
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
     * @param  \App\Http\Requests\StoreCourseFeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseFeesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseFees  $courseFees
     * @return \Illuminate\Http\Response
     */
    public function show(CourseFees $courseFees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseFees  $courseFees
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseFees $courseFees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseFeesRequest  $request
     * @param  \App\Models\CourseFees  $courseFees
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseFeesRequest $request, CourseFees $courseFees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseFees  $courseFees
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseFees $courseFees)
    {
        //
    }
}
