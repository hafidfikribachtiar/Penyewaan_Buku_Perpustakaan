<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//login & logout
Route::get('admin/auth/login', [App\Http\Controllers\Backend\AuthController::class, 'getLogin']);
Route::post('admin/auth/login', [App\Http\Controllers\Backend\AuthController::class, 'postLogin']);
// Route::get('admin/app', [App\Http\Controllers\Backend\AuthController::class, 'getApp']);
Route::get('admin/auth/logout', [App\Http\Controllers\Backend\AuthController::class, 'getLogout']);

Route::get('admin/books', [App\Http\Controllers\BooksController::class, 'getIndex']);
Route::get('admin/books/add', [App\Http\Controllers\BooksController::class, 'getAdd']);
Route::post('admin/books/save', [App\Http\Controllers\BooksController::class, 'postSave']);
Route::get('admin/books/edit/{id}', [App\Http\Controllers\BooksController::class, 'getEdit']);
Route::get('admin/books/delete/{id}', [App\Http\Controllers\BooksController::class, 'getDelete']);
Route::post('admin/books/{id}/edit', [App\Http\Controllers\BooksController::class, 'postEdit']);
Route::get('admin/books/detail/{id}', [App\Http\Controllers\BooksController::class, 'getDetail']);

Route::get('admin/members', [App\Http\Controllers\MembersController::class, 'getIndex']);
Route::get('admin/members/add', [App\Http\Controllers\MembersController::class, 'getAdd']);
Route::post('admin/members/save', [App\Http\Controllers\MembersController::class, 'postSave']);
Route::get('admin/members/edit{id}', [App\Http\Controller\MembersController::class, 'getEdit']);
Route::get('admin/members/delete', [App\Http\Controller\MembersController::class, 'getDelete']);
Route::post('admin/members/{id}/edit', [App\Http\Controllers\MembersController::class, 'postEdit']);
Route::get('admin/members/detail/{id}', [App\Http\Controllers\MembersController::class, 'getDetail']);

Route::get('admin/transactions', [App\Http\Controllers\TransactionsController::class, 'getIndex']);
Route::get('admin/transactions/add', [App\Http\Controllers\TransactionsController::class, 'getAdd']);
Route::post('admin/transactions/save', [App\Http\Controllers\TransactionsController::class, 'postSave']);
Route::get('admin/transactions/edit{id}', [App\Http\Controller\TransactionsController::class, 'getEdit']);
Route::get('admin/transactions/delete', [App\Http\Controller\TransactionsController::class, 'getDelete']);
Route::post('admin/transactions/{id}/edit', [App\Http\Controllers\TransactionsController::class, 'postEdit']);
Route::get('admin/transactions/detail/{id}', [App\Http\Controllers\TransactionsController::class, 'getDetail']);

Route::get('admin/useradmin', [App\Http\Controllers\UserAdminController::class, 'getIndex']);
Route::get('admin/useradmin/add', [App\Http\Controllers\UserAdminController::class, 'getAdd']);
Route::post('admin/useradmin/save', [App\Http\Controllers\UserAdminController::class, 'postSave']);
Route::get('admin/useradmin/edit{id}', [App\Http\Controller\UserAdminController::class, 'getEdit']);
Route::get('admin/useradmin/delete', [App\Http\Controller\UserAdminController::class, 'getDelete']);
Route::post('admin/useradmin/{id}/edit', [App\Http\Controllers\UserAdminController::class, 'postEdit']);
Route::get('admin/useradmin/detail/{id}', [App\Http\Controllers\UserAdminController::class, 'getDetail']);

Route::get('admin/transactiondetails', [App\Http\Controllers\TransactionDetailsController::class, 'getIndex']);
Route::get('admin/transactiondetails/add', [App\Http\Controllers\TransactionDetailsController::class, 'getAdd']);
Route::post('admin/transactiondetails/save', [App\Http\Controllers\TransactionDetailsController::class, 'postSave']);
Route::get('admin/transactiondetails/edit{id}', [App\Http\Controller\TransactionDetailsController::class, 'getEdit']);
Route::get('admin/transactiondetails/delete', [App\Http\Controller\TransactionDetailsController::class, 'getDelete']);
Route::post('admin/transactiondetails/{id}/edit', [App\Http\Controllers\TransactionDetailsController::class, 'postEdit']);
Route::get('admin/transactiondetails/detail/{id}', [App\Http\Controllers\TransactionDetailsController::class, 'getDetail']);

Route::get('admin/bookscategories', [App\Http\Controllers\BooksCategoriesController::class, 'getIndex']);
Route::get('admin/bookscategories/add', [App\Http\Controllers\BooksCategoriesController::class, 'getAdd']);
Route::post('admin/bookscategories/save', [App\Http\Controllers\BooksCategoriesController::class, 'postSave']);
Route::get('admin/bookscategories/edit{id}', [App\Http\Controller\BooksCategoriesController::class, 'getEdit']);
Route::get('admin/bookscategories/delete', [App\Http\Controller\BooksCategoriesController::class, 'getDelete']);
Route::post('admin/bookscategories/{id}/edit', [App\Http\Controllers\BooksCategoriesController::class, 'postEdit']);
Route::get('admin/bookscategories/detail/{id}', [App\Http\Controllers\BooksCategoriesController::class, 'getDetail']);

Route::group(["prefix"=>"admin"], function() {
    // Route::get("/books", "BooksController@getIndex");
    // Route::get("/books/add", "BooksController@add");
    // Route::get("/books/delete", "BooksController@delete");
    // Route::get("/books/edit/{id}", "BooksController@getEdit");
    // Route::post("/books/save","BooksController@postSave");
    Route::group(["prefix"=>"auth"], function() {
        // Route::post("login","Backend\Auth\AuthController@postLogin");
    });

    Route::group(["middleware"=>[\App\Http\Middleware\AdminMiddleware::class]], function() {
        Route::get("/app", [App\Http\Controllers\Backend\AuthController::class, 'getApp']);
        // Route::get("/logout", "Backend\Auth\AuthController@getLogout")->name('logout');
    });
});


