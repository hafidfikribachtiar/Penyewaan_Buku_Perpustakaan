<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionDetailsController extends Controller
{
    public function getIndex(){
    
        $transactiondetails = DB::table('transactiondetails')->get();
        $data = [];
        $data['transactiondetails'] = $transactiondetails;

        return view("Backend.transactiondetails.index", $data);
    }
        
    //form tambah
    public function postSave (Request $request){
        DB::table('transactiondetails')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/admin/transactiondetails');
    }

    //simpan form
    public function getEdit($id)
    {
        $transactiondetails = TransactionDetailsModel::find($id);

        // show the edit form and pass the books
        return View::make('Backend.transactiondetails.edit')
            ->with('transactiondetails', $transactiondetails);
    }

    public function postEdit (Request $request){
        DB::table('transactiondetails')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
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
        return view ('Backend.transactiondetails.add');
    }
}
