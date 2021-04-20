<?php

namespace App\Http\Controllers\Backend\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserAdminModel;
use App\Repositories\BookCategories;
use View;
use Hash;

class UserAdminController extends Controller
{
    public function getIndex(Request $request){
    
        $useradmin = DB::table('user_admin')->simplePaginate();
        $data = [];
        $data['useradmin'] = $useradmin;

        return view("Backend.useradmin.index", $data);
    }
        
    //form save
    public function postSave (Request $request){
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if($request->password) {
        $data['password'] = Hash::make ($request->password);
        }
        if($request->id) {
            DB::table('user_admin')->where("id", $request->id)->update($data);
        } else {
            DB::table('user_admin')->insert($data);
        }
        return redirect('/admin/useradmin');
    }

    //edit data
    public function getEdit($id)
    {
        $data['row'] = UserAdminModel::find($id);
        $data['form'] = url('admin/useradmin/save');
        return view("Backend.userAdmin.form",$data);
    }
    
    //delete data
    public function getDelete ($id)
    {
        UserAdminModel::deleteById($id);
        
        return redirect()->back()->with(["message"=> "the data has been deleted!"]);
    }

    //detail data
    public function getDetail ($id)
    {
        $data['row'] = UserAdminModel::findById($id);
        return view ('Backend.useradmin.detail',$data);
    }

    //add data
    public function getAdd ()
    {
        $data['form'] = url('admin/useradmin/save');
        return view ('Backend.useradmin.form',$data);
    }
}
