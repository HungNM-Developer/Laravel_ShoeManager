<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\TagController;

use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    $users = DB::table('users')->get();
    return view('user.userlist',['users'=>$users]);
});

///////////////////////
Route::get('/checkfail', function (){
    echo "checkfail page";
    return view('admin.dashboard');
});
Route::get('checkage/{age?}', function ($age) {
    echo $age;
    $users = DB::table('users')->get();
    return view('user.userlist',['users'=>$users]);
})->middleware(\App\Http\Middleware\CheckAge::class);

/////////////////////////////////
Route::resource('users', UserController::class);

Route::resource('profiles', ProfileController::class);

Route::get('profile/check/{id}',[ProfileController::class,'checkAvaProfile']);

Route::resource('products', ProductController::class);

Route::resource('articles', ArticleController::class);

Route::resource('orders', OrderController::class);

Route::resource('tags', TagController::class);