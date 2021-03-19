<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTokensModel extends Model
{
    use HasFactory;
    protected $table='api_tokens';
    protected $fillable=[
        'user_agent', 'ip_address', 'token', 'users_id' 
    ];

}
