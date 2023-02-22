<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeesModeTypeResource;
use App\Models\FeesModeType;
use Illuminate\Http\Request;

class FeesModeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesModeTypes = FeesModeType::get();
        return response()->json(['success'=>1,'data'=> FeesModeTypeResource::collection($feesModeTypes)], 200,[],JSON_NUMERIC_CHECK);
    }
    public function index_by_id($id)
    {
        $feesModeType = FeesModeType::findOrFail($id);
        return response()->json(['success'=>1,'data'=> new FeesModeTypeResource($feesModeType)], 200,[],JSON_NUMERIC_CHECK);
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
     * @param  \App\Models\FeesModeType  $feesModeType
     * @return \Illuminate\Http\Response
     */
    public function show(FeesModeType $feesModeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeesModeType  $feesModeType
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesModeType $feesModeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeesModeType  $feesModeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeesModeType $feesModeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeesModeType  $feesModeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesModeType $feesModeType)
    {
        //
    }
}
