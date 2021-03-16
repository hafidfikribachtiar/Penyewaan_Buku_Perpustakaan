<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Category;
use App\Models\Books;

class BooksController extends Controller
{
    public function getIndex(){
    
        $books = DB::table('books')->get();
        $data = [];
        $data['books'] = $books;

        return view("Backend.books.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('books')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/books');
    }

    //simpan form
    public function getEdit($id)
    {
        $books = books::table($id);
        return view::make('Backend.books.edit')->with('books', $books);
    }

    //form edit
    public function getDelete ($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect('/books');
    }

    //hapus data
    public function getDetail ($id)
    {
        //
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.books.add');
    }
}