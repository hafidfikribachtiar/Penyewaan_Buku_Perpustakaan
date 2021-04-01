<?php
namespace App\Repositories;

use App\Models\MembersModel;

class Members extends MembersModel
{
    // TODO : Make your own query methods
    public static function findAllData($search){
        $books = DB::table('books');
        if($search) {
            $books = $books->where(function($q) use ($search){
                $q->where('title','like','%'.$search.'%')
                    ->orwhere('description','like','%'.$search.'%')
                    ->orwhere('price','like','%'.$search.'%');
            });
        }
        $books = $books->get();
        return $books;
    }
}