<?php

namespace App\Http\Controllers\Backend\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MembersModel;
use App\Repositories\Members;
use View;

class MembersController extends Controller
{
    public function getIndex(Request $request){
    
        $members = Members::findAllData($request->search);
        $data = [];
        $data ['members'] = $members;

        return view("Backend.members.index", $data);
    }
        
    //form save
    public function postSave (Request $request){
    //     DB::table('members')->update([
    //         'name'=> $request->name,
    //         'phone' => $request->phone,
    //         'address'=> $request->address,
    //         'email'=> $request->email
    //     ]);
    //     return redirect('/admin/members');
    // }

    $members = new Members();
        $members->name = $request->name;
        $members->phone = $request->phone;
        $members->address = $request->address;
        $members->email = $request->email;
        $members->save();
        return redirect('/admin/members');
    }

    //edit data
    public function getEdit($id)
    {
        $books = MembersModel::find($id);
        return view("Backend.members.form", [
            'form'  => url ('admin/members/'.$id.'/edit'),
            'name'  => $members->name,
            'phone' => $members->phone,
            'address'=> $members->members,
            'email' => $members->email
        ]);
    }

    //delete data
    public function getDelete ($id)
    {
        // DB::table('members')->where('id', $id)->delete();
        // return redirect('/members');
        MembersModel::deleteById($id);

        return redirect()->back()->with(["message"=>"Members has been deleted!"]);
    }

    //detail data
    public function getDetail ($id)
    {
        $data['row'] = MembersModel::findById($id);
        return view ('Backend.members.detail',$data);
    }

    //add data
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
