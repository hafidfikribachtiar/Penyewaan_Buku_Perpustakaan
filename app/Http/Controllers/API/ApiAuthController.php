<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ApiTokensModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;

class ApiAuthController extends Controller
{
    public function postToken (Request $request){
        try{
            $tokens=ApiTokensModel::create([
                'user_agent' => $request->user_agent,
                'ip_address' => $request->ip_address,
                'token' => Str::random(32),
                'users_id' => $request->users_id,
            ]);
            if ($tokens){
                return [
                    'status'=>true,
                    'messege'=>'succcess',
                    'data'=> $tokens
                ];
            }else{
                return [
                    'status'=>false,
                    'messege'=>'error',
                    'data'=> null 
                ];
            } 
        }catch(\Exception $e){
            return [
                'status'=>false,
                'messege'=>'error',
                'data'=> null,
                'error'=> $e->getMessage() 
            ];
        }
    }
    public function readallToken (){
        return ApiTokensModel::all();
    }
    public function postLogin (Request $request){
        $data = ApiTokensModel::where("token", $request->token)->first();
        if ($data!=null){
            if ($data->users_id!=null){
                $user=UsersModel::find($data->users_id);
                $login=auth()->login($user);
                dd($login);
                if ($login){
                    return [
                        'status'=>true,
                        'message'=>'Login Succeseeded!',
                        'data'=>[
                            'id'=>$user->id,
                            'name'=>$user->name,
                            'email'=>$user->email,
                        ]
                        ];
                }
            }else{
                return [
                    'status'=>false,
                    'message'=>'Token Has Been Used',
                    'data'=>null
                    ];
            }
        }else{
            return [
                'status'=>false,
                'message'=>'Invalid Token',
                ];
        }
    }
    
    public function postLogout (Request $request){
        ApiTokensModel::where('token',$request->token)->update([
            'users_id'=> null
        ]);
        return [    
            'status'=>true,
            'message'=>'You have been log out!',
        ];
    }
}
