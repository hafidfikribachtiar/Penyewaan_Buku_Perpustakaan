<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    // localhost/projek/public/admin/auth/login
    public function getLogin()
    {
        // if(session('admin_id')) return redirect('/admin/app');
        dd("A");
        return view("backend.Auth.login");
    }   

    public function postLogin(Request $request){
        $data = Users::findBy("email", $request->get("email"));
        if ($data->id){
            if(Hash::check($request->password,$data->password)){
                session()->put("admin_id", $data->id);
                return redirect('/admin/app');
            } else {
                return redirect()->back()->with('message','Password salah');
            }
        } else {
            return redirect()->back()->with('message','Email salah');
        }
        
    }
    
    public function getLogout(){
        session()->forget("admin_id");
        return redirect('admin/auth/login'); // localhost/projek/public/admin/auth/login
    }

    Public function app(){
        return view ('layout.app');
    }
}
