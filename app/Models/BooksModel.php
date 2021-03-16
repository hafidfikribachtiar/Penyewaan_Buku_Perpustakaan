<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class BooksModel extends Model
{
    
	public $id;
	public $title;
	public $description;
	public $price;
	public $books_categories_id;
	public $created_at;
	public $updated_at;

}