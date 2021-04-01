<?php
namespace App\Repositories;

use DB;
use App\Models\BookCategoriesModel;

class BookCategories extends BookCategoriesModel
{
    // TODO : Make your own query methods
    public static function findAllData($search){
        $bookcategories = DB::table('book_categories');
        if($search) {
            $bookcategories = $bookcategories->where('name',$search);
        }
        $bookcategories = $bookcategories->get();
        return $bookcategories;
    }

}