<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\UserAdminModels;

class UserAdminController extends Controller
{
    public function getIndex(){
    
        $useradmin = DB::table('user_admin')->get();
        $data = [];
        $data['useradmin'] = $useradmin;

        return view("Backend.useradmin.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('user_admin')->insert([
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/admin/useradmin');
    }

    //simpan form
    public function getEdit($id)
    {
        $useradmin = UserAdminModel::find($id);

        // show the edit form and pass the books
        return View::make('Backend.useradmin.edit')
            ->with('useradmin', $useradmin);
    }

    public function postEdit (Request $request){
        DB::table('user_admin')->insert([
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('/admin/useradmin');
    }

    //form edit
    public function getDelete ($id)
    {
        Books::deleteById($id);
        
        return redirect()->back()->with(["message"=>"useradmin".$useradmin->name." has been deleted!"]);
        return view ('Backend.useradmin.index');
    }

    //hapus data
    public function getDetail ($id)
    {
        $useradmin = UserAdmin::findById($id);
        return view ('Backend.useradmin.detail', [
            'created_at' => $useradmin->created_at,
            'updated_at' => $useradmin->updated_at,
            'name' => $useradmin->name,
            'email' => $useradmin->email,
            'password' => $useradmin->password,
        ]);
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.useradmin.form',[
        'form' => url('admin/useradmin/save'),
            'created_at' => old('created_at'),
            'updated_at' => old('updated_at'),
            'name' => old('name'),
            'email' => old('email'),
            'password' => old('password'),
        ]);
    }
}
