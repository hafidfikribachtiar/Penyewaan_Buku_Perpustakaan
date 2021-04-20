<?php
namespace App\Repositories;
use DB;
use App\Models\TransactionsModel;

class Transactions extends TransactionsModel
{
    public static function findAllData($search){
        $transactions = DB::table('transactions');
        if($search) {
            $transactions = $transactions->where('name',$search);
        }
        $transactions = $transactions->simplePaginate(5);
        return $transactions;
    }

}