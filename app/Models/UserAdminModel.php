<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class UserAdminModel extends Model
{
    public $id;
    public $created_at;
    public $updated_at;
    public $name;
    public $email;
    public $password;
}