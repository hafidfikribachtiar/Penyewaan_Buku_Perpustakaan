<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class MembersModel extends Model
{
    
	public $id;
	public $name;
	public $phone;
	public $address;
	public $email;
	public $created_at;
	public $updated_at;

}