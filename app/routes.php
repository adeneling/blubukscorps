<?php
/*
Untuk membuat route ini hanya dapat diakses oleh admin, dengan route http://domain/admin/members
lakukan route grouping (untuk filter auth) dan route prefixing. dan akan
menambahkan filter admin sebelum mengakses resource member untuk mengecek apakah User yang
login adalah Admin.
*/

Route::get( '/' , function(){
	return View::make( 'guest.index' );
});

//dashboard dan manage members
Route::group( array( 'before' => 'auth' ), function () {

	Route::get( 'dashboard' , 'HomeController@dashboard' );

	Route::group( array( 'prefix' => 'admin' , 'before' => 'admin' ), function(){
		Route::resource( 'members' , 'MembersController' );
	});
});

//Transaksi
Route:: group( array( 'prefix' => 'admin' , 'before' => 'admin' ), function(){
	Route::resource( 'members' , 'MembersController' );
	Route::resource( 'transactions' , 'TransactionsController' );
});

Route::get( 'login' , array( 'guest.login' , 'uses' => 'GuestController@login' ));
Route::post( 'authenticate' , 'HomeController@authenticate' );
Route::get( 'logout' , 'HomeController@logout' );

// Pendaftaran 
Route::get('signup', array( 'as' => 'home.signup' , 'uses' => 'GuestController@signup' ));
Route::get( 'login' , array( 'as' => 'guest.login' , 'uses' => 'GuestController@login' ));
Route::post( 'register' , array( 'as' => 'guest.register' , 'uses' => 'GuestController@register' ));

// Aktivasi
Route::get( 'activate' , array( 'as' => 'user.activate' , 'uses' => 'GuestController@activate' ));

// cek Environment
Route::get('env', function(){
	return App::environment();
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|


Route::get('/', function()
{
	return View::make('guest.index');
});

Route::get( 'dashboard', array('before'=>'auth','uses'=>'HomeController@dashboard' ));
Route::get('login', array('guest.login', 'uses'=>'GuestController@login'));
Route::get('logout', 'HomeController@logout');
Route::post('authenticate', 'HomeController@authenticate');

Route::resource('members','MembersController');

Route:: group( array( 'before' => 'auth' ), function () {
	Route:: get( 'dashboard' , 'HomeController@dashboard' );
	Route:: group( array( 'prefix' => 'admin' , 'before' => 'admin' ), function(){
		Route:: resource( 'authors' , 'AuthorsController' );
	});
});
*/

