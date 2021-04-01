<?php

namespace App\Http\Controllers\Backend\BookCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BookCategoriesModel;
use view;

class BookCategoriesController extends Controller
{
    public function getIndex(){
    
        $bookcategories = DB::table('book_categories')->get();
        $data = [];
        $data['bookcategories'] = $bookcategories;

        return view("Backend.bookcategories.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('book_categories')->insert([
            'transactions_id' => $request->transactions_id,
            'books_id' => $request->books_id,
            'books_name' => $request->books_name,
            'books_price' => $request->books_price,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ]);
        return redirect('/admin/bookcategories');
    }

    //simpan form
    public function getEdit($id)
    {
        $bookcategories = BookCategories::find($id);

        // show the edit form and pass the books
        return View::make('Backend.bookcategories.form')
            ->with('bookcategories', $bookcategories);
    }

    public function postEdit (Request $request){
        DB::table('book_categories')->insert([
            'transactions_id' => $request->transactions_id,
            'books_id' => $request->books_id,
            'books_name' => $request->books_name,
            'books_price' => $request->books_price,
            'quantity' => $request->quantity,
            'total' => $request->total,
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
        return view ('Backend.bookcategories.form',[
            'form' => url('admin/bookcategories/save'),
            'transactions_id' => old('transactions_id'),
            'books_id' => old('books_id'),
            'books_name' => old('books_name'),
            'books_price' => old('books_price'),
            'quantity' => old('quantity'),
            'total' => old('total'),
        ]);
    }
}
