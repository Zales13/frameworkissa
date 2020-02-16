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



Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
Route::get('/adminOnlyPage','UsersController@afficher')->name('current_users_admin');
});


Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');
Route::get('/memberOnlyPage','UsersController@afficher')->name('current_users_member');
});



Route::resource('users', 'UsersController' )->except([
		'show', 'index',
])->middleware('can:manage');
Route::resource('users', 'UsersController')->only(['show'])->middleware('can:view');
