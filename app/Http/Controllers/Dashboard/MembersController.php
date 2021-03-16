<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function getIndex ()
    {
        $members = DB::table ('members')->get();
        $data = [];
        $data ['members']= $members;
        
        return view ('members.index'), $data;
    }

    public function postSave (Request $request)
    {
        DB::table('members')->insert([
        'name'=> $request->name,
        'phone' => $request->phone,
        'address'=> $request->address,
        'email'=> $request->email
        ]);
        return redirect('/admin/members');
    }
}
