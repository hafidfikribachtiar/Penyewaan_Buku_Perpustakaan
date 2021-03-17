<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdminController extends Controller
{
    public function getIndex(){
    
        $useradmin = DB::table('useradmin')->get();
        $data = [];
        $data['useradmin'] = $useradmin;

        return view("Backend.useradmin.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('useradmin')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
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
        DB::table('useradmin')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
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
    public function getDetail ()
    {
        return view ('Backend.useradmin.detail');
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.useradmin.add');
    }
}
