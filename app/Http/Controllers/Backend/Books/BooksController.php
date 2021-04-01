<?php

namespace App\Http\Controllers\Backend\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Category;
use App\Models\BooksModel;
use App\Repositories\Books;
use View;

class BooksController extends Controller
{
    public function getIndex(Request $request){
    
        $books = Books::findAllData($request->search);
        $data = [];
        $data['books'] = $books;

        return view("Backend.Books.index", $data);
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
        // return View::make('Backend.books.form')
            // ->with('books', $books);
            // dd([
            //     'form' => url('admin/books/'.$id.'/edit'),
            //     'title' => $books->title,
            //     'description' => $books->description,
            //     'price' => $books->price
            // ]);

        return view('Backend.Books.form', [
            'form' => url('admin/books/'.$id.'/edit'),
            'title' => $books->title,
            'description' => $books->description,
            'price' => $books->price
        ]);
    }

    public function postEdit (Request $request){
        DB::table('books')->update([
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
        return view ('Backend.Books.detail', [
            'title' => $books->title,
            'description' => $books->description,
            'price' => $books->price
        ]);
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.Books.form',[
            'form' => url('admin/books/save'),
            'title' => old('title'),
            'description' => old('description'),
            'price' => old('price'),
        ]);
    }
}