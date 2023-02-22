<?php

namespace App\Http\Controllers;

use App\Models\StudentQuery;
use App\Http\Requests\StoreStudentQueryRequest;
use App\Http\Requests\UpdateStudentQueryRequest;
use Illuminate\Http\Request;



class StudentQueryController extends Controller
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
    public function save_query(Request $request)
    {


        $student_query = new StudentQuery();
        $student_query->student_name = $request->input('studentName');
        $student_query->address = $request->input('address');
        $student_query->father_name = $request->input('fatherName');
        $student_query->mother_name = $request->input('motherName');
        $student_query->guardian_name = $request->input('guardianName');
        $student_query->relation_to_guardian = $request->input('relationToGuardian');
        $student_query->educational_institution = $request->input('educationalInstitution');
        $student_query->phone_number = $request->input('phoneNumber');
        $student_query->query = $request->input('query');
        $student_query->save();

        return response()->json(['success'=>1,'data'=>$student_query], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentQueryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentQueryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function show(StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentQueryRequest  $request
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentQueryRequest $request, StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentQuery $studentQuery)
    {
        //
    }
}
