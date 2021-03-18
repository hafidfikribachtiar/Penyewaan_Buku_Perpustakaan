<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class TransactionDetailsModel extends Model
{
    public $id;
    public $transactions_id;
    public $books_id;
    public $books_name;
    public $books_price;
    public $quantity;
    public $total;
}