<?php
namespace App\Repositories;
use DB;
use App\Models\MembersModel;

class Members extends MembersModel
{
    // TODO : Make your own query methods
    public static function findAllData($search){
        $members = DB::table('members');
        if($search) {
            $members = $members->where(function($q) use ($search){
                $q->where('name','like','%'.$search.'%')
                    ->orwhere('phone','like','%'.$search.'%')
                    ->orwhere('address','like','%'.$search.'%')
                    ->orwhere('email','like','%'.$search.'%');
            });
        }
        $members = $members->simplePaginate(1);
        return $members;
    }
}