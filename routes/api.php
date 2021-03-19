<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ApiTokensModel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('api_tokens/{id}', function ($id) {
    return ApiTokensModel::find($id);
});

Route::post('auth/token',  [App\Http\Controllers\API\ApiAuthController::class,'postToken']);
Route::get('auth/getall',  [App\Http\Controllers\API\ApiAuthController::class,'readallToken']);
Route::post('/auth/login', [App\Http\Controllers\API\ApiAuthController::class, 'postLogin']);
Route::post('/auth/logout', [App\Http\Controllers\API\ApiAuthController::class, 'postLogout']);

Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://third-party-app.com/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://passport-app.com/oauth/authorize?'.$query);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
