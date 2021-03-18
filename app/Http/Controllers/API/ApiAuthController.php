<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ApiTokens;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function postToken (){
        schema::create('api_tokens')->insert([
            'user_agent' => $request->user_agent,
            'ip_address' => $request->ip_address,
            'token' => $request->token,
            'user_id' => $request->user_id,
        ]);
    }


}
