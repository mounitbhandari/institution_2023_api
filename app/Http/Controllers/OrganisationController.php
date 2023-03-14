<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class OrganisationController extends Controller
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
     * @param  \App\Http\Requests\StoreOrganisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(StoreOrganisationRequest $request)
    {
        //
    } */

    public function organisation_Store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'organisationName' => 'required|max:255|unique:organisations,organisation_name',
            'emailId' => "required|max:255",
            'address' => "required|max:255",     
        ]);
        DB::beginTransaction();

       try{
         

           // if any record is failed then whole entry will be rolled back
           //try portion execute the commands and catch execute when error.
            $organisation= new Organisation();
           
            $organisation ->organisation_name = $request->input('organisationName');
            $organisation ->address = $request->input('address');
            $organisation->state_id = $request->input('stateId');
            $organisation->city = $request->input('city');
            $organisation->district= $request->input('district');
            $organisation->pin= $request->input('pin');
            $organisation->contact_number= $request->input('contactNumber');
            $organisation->whatsapp_number= $request->input('whatsappNumber');
            $organisation->email_id= $request->input('emailId');
            $organisation->opening_balance= $request->input('openingBalance');
           
            $organisation->save();
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
          return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
            //return $this->errorResponse($e->getMessage());
        }
        return response()->json(['success'=>1,'data'=>$organisation], 200,[],JSON_NUMERIC_CHECK);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function get_all_organisation_list()
    {
        $result = DB::select("Select organisations.id,
        organisations.state_id as state_id,
        organisation_name,
        address,
        city,
        district,
        pin,
        whatsapp_number,
        contact_number,
        email_id,
        states.state_name,
        opening_balance
        from organisations
        inner join states on organisations.id = states.id
        order by organisations.id desc");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_organisation_by_id($id)
    {
        $result = DB::select("Select id,
        organisation_name,
        address,
        city,
        district,
        pin,
        whatsapp_number,
        contact_number,
        email_id,
        opening_balance
        from organisations
        where id='$id'");
        
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
   
    public function organisation_update(Request $request)
    {     
        $organisation = Organisation::findOrFail($request->input('organisationId'));
        $organisation ->organisation_name = $request->input('organisationName');
        $organisation ->address = $request->input('address');
        $organisation->state_id = $request->input('stateId');
        $organisation->city = $request->input('city');
        $organisation->district= $request->input('district');
        $organisation->pin= $request->input('pin');
        $organisation->contact_number= $request->input('contactNumber');
        $organisation->whatsapp_number= $request->input('whatsappNumber');
        $organisation->email_id= $request->input('emailId');
        $organisation->opening_balance= $request->input('openingBalance');
        
       $organisation->save();
        //return $this->successResponse($organisation);
        return response()->json(['success'=>1,'data'=>$organisation], 200,[],JSON_NUMERIC_CHECK);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganisationRequest  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
