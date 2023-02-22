<?php

namespace App\Http\Controllers;

use App\Event\UserRegistered;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class UserController extends ApiController
{

    public function index(){
        //        event(new UserRegistered("This is a testing for event"));
        $user = User::all();
        return $this->successResponse($user);
    }

    public function revoke_all(Request $request){
        //revoke all tokens from current user
        $user = request()->user();
        $result = $user->tokens()->delete();
        return $this->successResponse($result);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => $request->password,
            'user_name' => $request->user_name,
            'user_type_id' => $request->user_type_id
        ]);

//        return response()->json(['success'=>1,'data'=>$user], 200,[],JSON_NUMERIC_CHECK);

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    /*
        format of json for login
        {
            "loginId": "arindam",
            "loginPassword": "81dc9bdb52d04dc20036dbd8313ed055"
        }
    */
    function login(Request $request)
    {
        $user= User::where('email', $request->loginId)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->loginPassword, $user->password)) {
            return response()->json(['success'=>0,'data'=>null, 'message'=>'Credential does not matched'], 200,[],JSON_NUMERIC_CHECK);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->setAttribute('token',$token);
        return $this->successResponse(new LoginResource($user));

    }


    function getCurrentUser(Request $request){
        return $request->user();
//        return User::get();

    }

    function getAllUsers(Request $request){
        return User::get();
    }
	function authenticationError(){
        return $this->errorResponse('Credential does not matched',401);
    }
    function logout(Request $request){
        $result = $request->user()->currentAccessToken()->delete();
        return response()->json(['success'=>$result,'data'=>null, 'message'=>'Token revoked'], 200,[],JSON_NUMERIC_CHECK);
    }

    function uploadUserPicture(Request $request){
//        $input = json_decode($request->getContent(), true);


        $fileName = $request['filename'];
//        $fileName = 'test1.jpeg';
//        return $fileName;
        //first saving picture

        //return $fileName;
        $path = $request->file('file')->move(public_path("/profile_pic"), $fileName);
//        $photoUrl = url('/entrant_pictures/' . $fileName);
        return $this->successResponse($request->file('file'));
//        return response()->json(['success'=>100,'data'=> $path], 200,[],JSON_NUMERIC_CHECK);

    }
    function uploadStudentPicture(Request $request){
//        $input = json_decode($request->getContent(), true);


        $fileName = $request['filename'];
//        $fileName = 'test1.jpeg';
//        return $fileName;
        //first saving picture

        //return $fileName;
        $path = $request->file('file')->move(public_path("/student_pictures"), $fileName);
//        $photoUrl = url('/entrant_pictures/' . $fileName);
        return $this->successResponse($request->file('file'));
//        return response()->json(['success'=>100,'data'=> $path], 200,[],JSON_NUMERIC_CHECK);

    }
}
