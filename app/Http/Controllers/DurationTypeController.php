<?php

namespace App\Http\Controllers;

use App\Http\Resources\DurationTypeResource;
use App\Models\DurationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DurationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $durationType= DurationType::get();
        return response()->json(['success'=>1,'data'=> DurationTypeResource::collection($durationType)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function indexById($id)
    {
        $durationType= DurationType::findOrFail($id);
        return response()->json(['success'=>1,'data'=>new DurationTypeResource($durationType) ], 200,[],JSON_NUMERIC_CHECK);
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
        DB::beginTransaction();
        try{
            $durationType= new DurationType();
            $durationType->duration_name=$request->input('durationName');
            $durationType->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }
        return response()->json(['success'=>1,'data'=> $durationType], 200,[],JSON_NUMERIC_CHECK);
    }


    public function update(Request $request)
    {
        $durationType= new DurationType();
        $durationType= DurationType::find($request->input('durationTypeId'));
        $durationType->duration_name=$request->input('durationName');
        $durationType->save();
        return response()->json(['success'=>1,'data'=> $durationType], 200,[],JSON_NUMERIC_CHECK);
    }


    public function destroy($id)
    {
        $durationType= DurationType::find($id);
        if(!empty($durationType)){
            $result = $durationType->delete();
        }else{
            $result = false;
        }
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
