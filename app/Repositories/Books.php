<?php
namespace App\Repositories;

use DB;
use App\Models\BooksModel;

class Books extends BooksModel
{
    // TODO : Make your own query methods
    public static function findAllData($search){
        $books = DB::table('books');
        // $books = DB::table('books')->paginate(15);

        if($search) {
            $books = $books->where(function($q) use ($search){
                $q->where('title','like','%'.$search.'%')
                    ->orwhere('description','like','%'.$search.'%')
                    ->orwhere('price','like','%'.$search.'%');
            });
        }
        $books = $books->simplePaginate(5);

        // $books = $books->get();
        return $books;
    }
}