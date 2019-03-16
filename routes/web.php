<?php

/*
--------------------------------------
	 Copyright Bankole Emmnauel 2019 
--------------------------------------
	 mrbarnk.COM
*/

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

Route::resource('/', 'HomeController');
// Route::get('/', function () {
// 	if(session()->has('id')) {
// 		return view('auth.register');
// 	}
//     return view('auth.register');
// });

Route::resource('users', 'Users');

Route::get('logout', function (){
	session()->flush('all');
	return redirect('');
});

Route::post('logins', 'Users@logins');
Route::get('/api/username/{name}', 'API@username');
Route::get('/api/email/{name}', 'API@email');

Route::resource('/api/', 'API');
Route::get('/api/user/{id}', 'API@getmyuserdata');
Route::resource('post', 'Posts');
Route::get('{name}', function ($name)
{
	return view($name);
});