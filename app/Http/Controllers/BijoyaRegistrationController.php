<?php

namespace App\Http\Controllers;

use App\Models\BijoyaRegistration;
use App\Http\Requests\StoreBijoyaRegistrationRequest;
use App\Http\Requests\UpdateBijoyaRegistrationRequest;
use Illuminate\Http\Request;


class BijoyaRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentInfo()
    {
        $studentRegistration= BijoyaRegistration::get();

        return response()->json(['success'=>1,'data'=>$studentRegistration], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveStudentInfo(Request $request)
    {

        
        

        $studentRegistration = new BijoyaRegistration();
        $studentRegistration->student_name = $request->input('studentName');
        $studentRegistration->email = $request->input('email');
        $studentRegistration->contact_number = $request->input('contactNumber');
        $studentRegistration->whatsapp_number = $request->input('whatsappNumber');
        $studentRegistration->telegram_number = $request->input('telegramNumber');
        $studentRegistration->member_number = $request->input('memberNumber');

        $studentRegistration->save();
        return response()->json(['success'=>1,'data'=>$studentRegistration], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBijoyaRegistrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBijoyaRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BijoyaRegistration  $bijoyaRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(BijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BijoyaRegistration  $bijoyaRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(BijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBijoyaRegistrationRequest  $request
     * @param  \App\Models\BijoyaRegistration  $bijoyaRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBijoyaRegistrationRequest $request, BijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BijoyaRegistration  $bijoyaRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(BijoyaRegistration $bijoyaRegistration)
    {
        //
    }
}
