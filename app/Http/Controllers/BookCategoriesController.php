<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookCategoriesController extends Controller
{
    public function getIndex(){
    
        $books = DB::table('bookcategories')->get();
        $data = [];
        $data['bookcategories'] = $bookcategories;

        return view("Backend.bookcategories.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('bookcategories')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/bookcategories');
    }

    //simpan form
    public function getEdit($id)
    {
        $bookcategories = BookCategories::find($id);

        // show the edit form and pass the books
        return View::make('Backend.bookcategories.edit')
            ->with('bookcategories', $bookcategories);
    }

    public function postEdit (Request $request){
        DB::table('bookcategories')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/bookcategories');
    }

    //form edit
    public function getDelete ($id)
    {
        BookCategories::deleteById($id);
        
        return redirect()->back()->with(["message"=>"bookcategories".$bookcategories->name." has been deleted!"]);
        return view ('Backend.bookcategories.index');
    }

    //hapus data
    public function getDetail ()
    {
        return view ('Backend.bookcategories.detail');
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.bookcategories.add');
    }
}
