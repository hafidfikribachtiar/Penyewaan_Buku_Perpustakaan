<?php

namespace App\Http\Controllers\Backend\BookCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BookCategoriesModel;
use App\Repositories\BookCategories;
use view;

class BookCategoriesController extends Controller
{
    public function getIndex(Request $request){
    
        $bookcategories = BookCategories::findAllData($request->search);
        $data = [];
        $data['bookcategories'] = $bookcategories;

        return view("Backend.bookcategories.index", $data);
    }
        
    //form save
    public function postSave (Request $request){
        // DB::table('book_categories')->insert([
        //     'transactions_id' => $request->transactions_id,
        //     'books_id' => $request->books_id,
        //     'books_name' => $request->books_name,
        //     'books_price' => $request->books_price,
        //     'quantity' => $request->quantity,
        //     'total' => $request->total,
        // ]);
        // return redirect('/admin/bookcategories');

        $bookcategories = new Books();
        $bookcategories->books_name = $request->books_name;
        $bookcategories->books_price = $request->books_price;
        $bookcategories->quantity = $request->quantity;
        $bookcategories->total = $request->total;
        $bookcategories->save();
        return redirect('/admin/bookcategories');
    }

    //edit data
    public function getEdit($id)
    {
        $bookcategories = BookCategoriesModel::find($id);

        // show the edit form and pass the books
        // return View::make('Backend.bookcategories.form')
        //     ->with('bookcategories', $bookcategories);

        return view('Backend.bookcategories.form', [
            'form' => url('admin/bookcategories/'.$id.'/edit'),
            'name' => $bookcategories->name
        ]);
    }

    //form edit
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

    //delete data
    public function getDelete ($id)
    {
        BookCategories::deleteById($id);
        
        return redirect()->back()->with(["message"=>"bookcategories".$bookcategories->name." has been deleted!"]);
        return view ('Backend.bookcategories.index');
    }

    //detail data
    public function getDetail ($id)
    {
        // return view ('Backend.bookcategories.detail');
        $bookcategories = BookCategoriesModel::findById($id);
        return view ('Backend.BookCategories.detail', [
            'name' => $bookcategories->name
        ]);
    }

    //add data
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
