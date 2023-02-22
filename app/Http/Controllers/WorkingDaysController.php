<?php

namespace App\Http\Controllers;

use App\Models\WorkingDays;
use App\Http\Requests\StoreWorkingDaysRequest;
use App\Http\Requests\UpdateWorkingDaysRequest;

class WorkingDaysController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkingDaysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingDaysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkingDays  $workingDays
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingDays $workingDays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkingDays  $workingDays
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingDays $workingDays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkingDaysRequest  $request
     * @param  \App\Models\WorkingDays  $workingDays
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkingDaysRequest $request, WorkingDays $workingDays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkingDays  $workingDays
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingDays $workingDays)
    {
        //
    }
}
