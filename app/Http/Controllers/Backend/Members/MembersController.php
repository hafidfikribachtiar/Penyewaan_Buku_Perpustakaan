<?php

namespace App\Http\Controllers\Backend\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MembersModel;
use View;

class MembersController extends Controller
{
    public function getIndex(){
    
        $members = DB::table('members')->get();
        $data = [];
        $data ['members'] = $members;

        return view("Backend.members.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('members')->update([
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
        $members = MembersModel::find($id);

        return view ('Backend.members.form', [
        'form' => url ('admin/members/'.$id.'/edit'),
        'name' => $members->name,
        'phone' => $members->phone,
        'address' => $members->address,
        'email' => $members->email
        ]);
    }
    // public function postEdit (Request $request){
    //     DB::table('members')->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'price' => $request->price
    //     ]);
    //     return redirect('/admin/members');
    // }

    //form edit
    public function getDelete ($id)
    {
        // DB::table('members')->where('id', $id)->delete();
        // return redirect('/members');
        MembersModel::deleteById($id);

        return redirect()->back()->with(["message"=>"Members has been deleted!"]);
    }

    //hapus data
    public function getDetail ($id)
    {
        //
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.members.form', [
        'form' => url ('admin/members/save'),
        'name' => old ('name'),
        'phone' => old ('phone'),
        'address' => old ('address'),
        'email' => old ('email'),
        ]);
    }
}
