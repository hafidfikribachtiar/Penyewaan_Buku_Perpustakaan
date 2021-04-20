<?php
namespace App\Repositories;

use DB;
use App\Models\UserAdminModel;

class UserAdmin extends UserAdminModel
{
    public static function findAllData($search){
        $useradmin = DB::table('user_admin');
        if($search) {
            $useradmin = $useradmin->where('name',$search);
        }
        $useradmin = $useradmin->simplePaginate(5);
        return $useradmin;
    }
}