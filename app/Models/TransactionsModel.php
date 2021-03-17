<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class TransactionsModel extends Model
{
    
	public $id;
	public $trans_no;
	public $members_id;
	public $grand_total;
	public $crated_by;
	public $created_at;
	public $updated_at;

}