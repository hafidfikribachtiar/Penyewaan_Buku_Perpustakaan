<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionDetails;
use view;

class TransactionDetailsController extends Controller
{
    public function getIndex(){
    
        $transactiondetails = DB::table('transaction_details')->get();
        $data = [];
        $data['transactiondetails'] = $transactiondetails;

        return view("Backend.transactiondetails.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('transaction_details')->insert([
            'books_name' => $request->books_name,
            'books_price' => $request->books_price,
            'quantity' => $request->quantity,
            'total' => $request->total
        ]);
        return redirect('/admin/transactiondetails');
    }

    //simpan form
    public function getEdit($id)
    {
        $transactiondetails = TransactionDetailsModel::find($id);

        // show the edit form and pass the books
        return View::make('Backend.transactiondetails.form')
            ->with('transactiondetails', $transactiondetails);
    }

    public function postEdit (Request $request){
        DB::table('transaction_details')->insert([
            'books_name' => $request->books_name,
            'books_price' => $request->books_price,
            'quantity' => $request->quantity,
            'total' => $request->total
        ]);
        return redirect('/admin/transactiondetails');
    }

    //form edit
    public function getDelete ($id)
    {
        TransactionDetails::deleteById($id);
        
        return redirect()->back()->with(["message"=>"transactiondetails".$transactiondetails->name." has been deleted!"]);
        return view ('Backend.transactiondetails.index');
    }

    //hapus data
    public function getDetail ()
    {
        return view ('Backend.transactiondetails.detail');
    }

    //detail data
    public function getAdd ()
    {
        return view ('Backend.transactiondetails.form', [
        'form' => url('admin/transactionsdetails/save'),
        'books_name' => old ('books_name'),
        'books_price' => old ('books_price'),
        'quantity' => old ('quantity'),
        'total' => old ('total')
        ]);
    }
}
