<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('profiles');
});

Auth::routes();

Route::get('/home', 'ProfileController@create')->name('home');

Route::resource('profiles','profileController')->only([
    'index', 'create', 'store', 'edit', 'show', 'update'
]);
Route::get('search','profileController@search')->name('profiles.search');

Route::resource('favorites','favoriteController')->only(['store', 'index']);
