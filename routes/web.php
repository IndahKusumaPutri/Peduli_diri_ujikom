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


/*login & register*/
Route::get('/register','AuthController@getRegister')->name('register')->middleware('guest');
Route::post('/register','AuthController@postRegister')->middleware('guest');
Route::get('/login','AuthController@getLogin')->middleware('guest')->name('login');
Route::post('/login','AuthController@postLogin')->middleware('guest');;
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

Route::group(['middleware' => ['auth', 'role:admin,user']],function(){

    Route::get('/home', function() {
        return view('home');
    })->middleware('auth')->name('home');

    //user profile//
    Route::get('/user','UserprofileController@index')->middleware('auth')->name('user.index');
    Route::post('/user','UserprofileController@update')->middleware('auth');
    Route::post('/changepassword','UserprofileController@changepassword')->middleware('auth')->name('changepassword');

    /*Perjalanan*/
    Route::get('/perjalanan', 'PerjalananController@index');
    Route::get('/perjalanan/show/{id}','PerjalananController@show');
    Route::get('/perjalanan/tambah', 'PerjalananController@create');
    Route::post('perjalanan/store', 'PerjalananController@store');
    Route::get('/perjalanan/delete/{id_perjalanan}', 'PerjalananController@destroy');
    Route::get('/hapusall', 'PerjalananController@hapusall');
});

Route::group(['middleware' => ['auth', 'role:admin']],function(){
   
/*userprofile*/
Route::get('/datauser', 'UserprofileController@getuser')->middleware('auth');
Route::get('/getDataUser','UserprofileController@getAllUser'); 
Route::get('/user/cari', 'UserprofileController@cari')->middleware('auth');//untuk cari

});


