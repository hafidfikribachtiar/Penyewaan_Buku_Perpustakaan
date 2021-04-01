<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//login & logout
// Route::get('admin/app', [App\Http\Controllers\Backend\AuthController::class, 'getApp']);

Route::group(["prefix"=>"admin"], function() {
    // Route::get("/books", "BooksController@getIndex");
    // Route::get("/books/add", "BooksController@add");
    // Route::get("/books/delete", "BooksController@delete");
    // Route::get("/books/edit/{id}", "BooksController@getEdit");
    // Route::post("/books/save","BooksController@postSave");
    Route::group(["prefix"=>"auth"], function() {
        Route::get('login', [App\Http\Controllers\Backend\AuthController::class, 'getLogin']);
        Route::post('login', [App\Http\Controllers\Backend\AuthController::class, 'postLogin']);
        Route::get('logout', [App\Http\Controllers\Backend\AuthController::class, 'getLogout']);
        // Route::post("login","Backend\Auth\AuthController@postLogin");
    });

    Route::group(["middleware"=>[\App\Http\Middleware\AdminMiddleware::class]], function() {
        // Route::get("/app", [App\Http\Controllers\Backend\AuthController::class, 'getApp']);

        Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'getIndex']);

        Route::get('books', [App\Http\Controllers\Backend\Books\BooksController::class, 'getIndex']);
        Route::get('books/add', [App\Http\Controllers\Backend\Books\BooksController::class, 'getAdd']);
        Route::post('books/save', [App\Http\Controllers\Backend\Books\BooksController::class, 'postSave']);
        Route::get('books/edit/{id}', [App\Http\Controllers\Backend\Books\BooksController::class, 'getEdit']);
        Route::get('books/delete/{id}', [App\Http\Controllers\Backend\Books\BooksController::class, 'getDelete']);
        Route::post('books/{id}/edit', [App\Http\Controllers\Backend\Books\BooksController::class, 'postEdit']);
        Route::get('books/detail/{id}', [App\Http\Controllers\Backend\Books\BooksController::class, 'getDetail']);

        Route::get('members', [App\Http\Controllers\Backend\Members\MembersController::class, 'getIndex']);
        Route::get('members/add', [App\Http\Controllers\Backend\Members\MembersController::class, 'getAdd']);
        Route::post('members/save', [App\Http\Controllers\Backend\Members\MembersController::class, 'postSave']);
        Route::get('members/edit{id}', [App\Http\Controllers\Backend\Members\MembersController::class, 'getEdit']);
        Route::get('members/delete/{id}', [App\Http\Controllers\Backend\Members\MembersController::class, 'getDelete']);
        Route::post('members/{id}/edit', [App\Http\Controllers\Backend\Members\MembersController::class, 'postEdit']);
        Route::get('members/detail/{id}', [App\Http\Controllers\Backend\Members\MembersController::class, 'getDetail']);

        Route::get('transactions', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'getIndex']);
        Route::get('transactions/add', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'getAdd']);
        Route::post('transactions/save', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'postSave']);
        Route::get('transactions/edit{id}', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'getEdit']);
        Route::get('transactions/delete', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'getDelete']);
        Route::post('transactions/{id}/edit', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'postEdit']);
        Route::get('transactions/detail/{id}', [App\Http\Controllers\Backend\Transactions\TransactionsController::class, 'getDetail']);

        Route::get('useradmin', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'getIndex']);
        Route::get('useradmin/add', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'getAdd']);
        Route::post('useradmin/save', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'postSave']);
        Route::get('useradmin/edit{id}', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'getEdit']);
        Route::get('useradmin/delete', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'getDelete']);
        Route::post('useradmin/{id}/edit', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'postEdit']);
        Route::get('useradmin/detail/{id}', [App\Http\Controllers\Backend\UserAdmin\UserAdminController::class, 'getDetail']);

        Route::get('transactiondetails', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'getIndex']);
        Route::get('transactiondetails/add', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'getAdd']);
        Route::post('transactiondetails/save', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'postSave']);
        Route::get('transactiondetails/edit{id}', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'getEdit']);
        Route::get('transactiondetails/delete', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'getDelete']);
        Route::post('transactiondetails/{id}/edit', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'postEdit']);
        Route::get('transactiondetails/detail/{id}', [App\Http\Controllers\Backend\TransactionDetails\TransactionDetailsController::class, 'getDetail']);

        Route::get('bookcategories', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'getIndex']);
        Route::get('bookcategories/add', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'getAdd']);
        Route::post('bookcategories/save', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'postSave']);
        Route::get('bookcategories/edit{id}', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'getEdit']);
        Route::get('bookcategories/delete', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'getDelete']);
        Route::post('bookcategories/{id}/edit', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'postEdit']);
        Route::get('bookcategories/detail/{id}', [App\Http\Controllers\Backend\BookCategories\BookCategoriesController::class, 'getDetail']);
        // Route::get("/logout", "Backend\Auth\AuthController@getLogout")->name('logout');
    });
});


