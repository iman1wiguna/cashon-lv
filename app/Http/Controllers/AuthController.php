<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthModel;

class AuthController extends Controller

{
    public function LoginActivity(Request $request){
        try{
            $dataUser = AuthModel::where('phone_number',$request->phone_number)->where('security_code',$request->security_code)
            ->first();
            return response()->json([
                'message'=>"Success",
                'serve'=>$dataUser
            ],200);
        
         } catch (Exception $e){
             return response()->json([
                 "message"=>"Something Wrong",
                 "serve"=>[]
             ],500);
         }
    }

    public function RegisterActivity(Request $request){
        try{
            $dataUser = new AuthModel;
            $dataUser->username=$request->username;
            $dataUser->phone_number=$request->phone_number;
            $dataUser->security_code=$request->security_code;
            $dataUser->saldo=0;
            $dataUser->save();
            return response()->json([
                'message'=>"Success",
                'serve'=>$dataUser
            ],200);
        } catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
    }

    public function GetSaldo(Request $request){
        try{
            $dataUser = AuthModel::where('phone_number',$request->phone_number)->get();
            return response()->json([
                'message'=>"Success",
                'serve'=>$dataUser
            ],200);
        } catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);

        }
        
    }
}
