<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends BaseController
{
    public function register(Request $request){
        $validator= Validator::make($request->all(),[
            'name'=>'required',
            'gender'=>'required',
            'length'=>'required',
            'weight'=>'required',
          //  'focus_part'=>'required',
            'role'=>'required',
           // 'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|Same:password',
          //   'goal_id'=>'required',
            //'level_id'=>'required',
            //'sportprogram_id'=>'required',
            //'organic_id'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('please validate error',$validator->errors());
        }
        $input= $request->all();
        $input['password']=Hash::make($input['password']);
        $user= User::create($input);
        $success['token']=md5(time());//$user->createToken('Obada')->accessToken;
        $success['name']=$user->name;
        return $this->sendResponse($success,'user registered successfully');
        //*/
    }
    public function login(Request $request){
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            $user= Auth::user();
            $success['token']=$user->createToken('Obada')->accessToken;

            $success['name']=$user->name;

            return $this->sendResponse($success,'user login successfully');
        }
        else {
            return $this->sendError('please check your auth',['error'=>'Unauthorised']);
        }


    }
    public function logout(){
        Session::flush();

        Auth::logout();
        return response()->json(['message'=>'Thank you for using our application']);


    }
}
