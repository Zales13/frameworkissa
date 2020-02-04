<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/users', 'UsersController@afficher')-> name('current_user');

Route::get('/skill_user', 'UsersController@btn_skill')->name('skill_user');
Route::get('/skill_user/{id}', function ($id) {

    $id = DB::table('skill_user')->updateorinsert(['skill_id' => $id, 'user_id' => Auth::user()->id, 'level' => 1]);
    return redirect()->route('current_user');
});
Route::get('/skill_user_delete/{id_supp}', function ($id_supp) {

    Auth::user()->skills->find($id_supp)->pivot->delete();
    return redirect()->route('current_user');
});

Route::post('update', 'UsersController@update');
Route::post('delete', 'UsersController@delete');

