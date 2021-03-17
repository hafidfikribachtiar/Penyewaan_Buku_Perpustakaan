<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\TransactionsModel;

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
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/transactions');
    }

    //simpan form
    public function getEdit($id)
    {
        $transactions = TransactionDetails::find($id);

        // show the edit form and pass the books
        return View::make('Backend.transactions.edit')
            ->with('transactions', $transactions);
    }

    public function postEdit (Request $request){
        DB::table('transactions')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/transactions');
    }

    //form edit
    public function getDelete ($id)
    {
        Books::deleteById($id);
        
        return redirect()->back()->with(["message"=>"transactions".$transactions->name." has been deleted!"]);
        return view ('Backend.transactions.index');
    }

    //hapus data
    public function getDetail ()
    {
        return view ('Backend.transactions.detail');
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.transactions.add');
    }
}
