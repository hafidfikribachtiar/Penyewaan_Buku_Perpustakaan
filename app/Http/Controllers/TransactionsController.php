<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Category;
use App\Models\TransactionsModel;
use View;

class TransactionsController extends Controller
{
    public function getIndex(){
    
        $transactions = DB::table('transactions')->get();
        $data = [];
        $data['transactions'] = $transactions;

        return view("Backend.transactions.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('transactions')->insert([
            'trans_no' => $request->trans_no,
            'grand_total' => $request->grand_total,
            'created_by' => $request->created_by
        ]);
        return redirect('/admin/transactions');
    }

    //simpan form
    public function getEdit($id)
    {
        $transactions = TransactionsModel::find($id);

        // show the edit form and pass the books
        // return View::make('Backend.books.form')
            // ->with('books', $books);
            // dd([
            //     'form' => url('admin/books/'.$id.'/edit'),
            //     'title' => $books->title,
            //     'description' => $books->description,
            //     'price' => $books->price
            // ]);

        return view('Backend.transactions.form', [
            'form' => url('admin/transactions/'.$id.'/edit'),
            'trans_no' => $transactions->trans_no,
            'grand_total' => $transactions->grand_total,
            'created_by' => $transactions->created_by
        ]);
    }

    public function postEdit (Request $request){
        DB::table('transactions')->insert([
            'trans_no' => $request->trans_no,
            'grand_total' => $request->grand_total,
            'created_by' => $request->created_by
        ]);
        return redirect('/admin/transactions');
    }

    //form edit
    public function getDelete ($id)
    {
        TransactionsModel::deleteById($id);
       
        return redirect()->back()->with(["message"=>"Transactions has been deleted!"]);
    }

    //hapus data
    public function getDetail($id)
    {
        $transactions = TransactionsModel::findById($id);
        return view ('Backend.transactions.detail', [
            'trans_no' => $transactions->trans_no,
            'grand_total' => $transactions->grand_total,
            'created_by' => $transactions->created_by,
        ]);
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.transactions.form',[
            'form' => url('admin/transactions/save'),
            'trans_no' => old('trans_no'),
            'grand_total' => old('grand_total'),
            'created_by' => old('created_by'),
        ]);
    }
}