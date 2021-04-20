<?php
namespace App\Repositories;
use DB;
use App\Models\TransactionDetailsModel;

class TransactionDetails extends TransactionDetailsModel
{
    public static function findAllData ($search){
        $transactiondetails = DB :: table('transaction_details');
        if($search) {
            $transactiondetails = $transactiondetails->whare('name',$search);
        }
        $transactiondetails = $transactiondetails->simplePaginate(5);
        return $transactiondetails;
    }
}