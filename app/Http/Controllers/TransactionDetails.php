<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionDetails extends Controller
{
    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function getIndex(){
    
        $members = DB::table('members')->get();
        $data = [];
        $data['members'] = $members;

        return view("members.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('members')->insert([
            'name'=> $request->name,
            'phone' => $request->phone,
            'address'=> $request->address,
            'email'=> $request->email
        ]);
        return redirect('/admin/members');
    }

    //simpan form
    public function getEdit($id)
    {
        return view ('members.edit');
    }

    //form edit
    public function getDelete ($id)
    {
        DB::table('members')->where('id', $id)->delete();
        return redirect('/members');
    }

    //hapus data
    public function getDetail ($id)
    {
        //
    }

    //detail data
    public function getAdd ()
    {
        return view ('members.add');
    }
}

}
