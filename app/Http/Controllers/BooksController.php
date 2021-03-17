<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Category;
use App\Models\BooksModel;
use View;

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
        $books = BooksModel::find($id);

        // show the edit form and pass the books
        return View::make('Backend.books.edit')
            ->with('books', $books);
    }

    public function postEdit (Request $request){
        DB::table('books')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/books');
    }

    //form edit
    public function getDelete ($id)
    {
        BooksModel::deleteById($id);
       
        return redirect()->back()->with(["message"=>"Books has been deleted!"]);
    }

    //hapus data
    public function getDetail($id)
    {
        $books = BooksModel::findById($id);
        return view ('Backend.books.detail', [
            'title' => $books->title
        ]);
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.books.add');
    }
}