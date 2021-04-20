<?php

namespace App\Http\Controllers\Backend\TransactionDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionDetailsModel;
use App\Repositories\TransactionDetails;
use view;

class TransactionDetailsController extends Controller
{
    public function getIndex(Request $request){
    
        $transactiondetails = TransactionDetails::findAllData($request->search);
        $data = [];
        $data ['transactiondetails'] = $transactiondetails;

        return view("Backend.transactiondetails.index", $data);
    }
        
    //form save
    public function postSave (Request $request){
        // DB::table('transaction_details')->insert([
        //     'books_name' => $request->books_name,
        //     'books_price' => $request->books_price,
        //     'quantity' => $request->quantity,
        //     'total' => $request->total
        // ]);
        // return redirect('/admin/transactiondetails');

        $transactiondetails = new Members();
        $transactiondetails->books_name = $request->books_name;
        $transactiondetails->books_price = $request->books_price;
        $transactiondetails->quantity = $request->quantity;
        $transactiondetails->total = $request->total;
        $transactiondetails->save();
        return redirect('/admin/transactiondetails');
    }

    //edit data
    public function getEdit($id)
    {
        // show the edit form and pass the books
        // $transactiondetails = TransactionDetailsModel::find($id);
        // return View::make('Backend.transactiondetails.form')
        //     ->with('transactiondetails', $transactiondetails);
        $data['row'] = TransactionsDetailsModel::find($id);
        $data['form'] = url('admin/transactiondetails/save');
        return view("Backend.transactiondetails.form",$data);
    }

    //form edit
    public function postEdit (Request $request){
        DB::table('transaction_details')->insert([
            'books_name' => $request->books_name,
            'books_price' => $request->books_price,
            'quantity' => $request->quantity,
            'total' => $request->total
        ]);
        return redirect('/admin/transactiondetails');
    }

    //delete 
    public function getDelete ($id)
    {
        TransactionDetails::deleteById($id);
        
        return redirect()->back()->with(["message"=>"transactiondetails".$transactiondetails->name." has been deleted!"]);
        return view ('Backend.transactiondetails.index');
    }

    //detail data
    public function getDetail ()
    {
        // return view ('Backend.transactiondetails.detail');
        $data['row'] = TransactionDetailsModel::findById($id);
        return view ('Backend.transactiondetails.detail',$data);
    }

    //add data 
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
