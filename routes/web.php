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

Route::get('/', 'HomeController@index');
Route::get('/accueil', 'HomeController@index')->name('accueil');
Route::get('/home', 'HomeController@index')->name('home');

/* Espace admin */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@admin']);
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController')->except('show');
    Route::resource('/permissions', 'PermissionController')->only('index', 'edit', 'update');
    Route::resource('/communes', 'CommuneController');
});

Route::get('/dashboard', ['as' => 'gestion.dashboard', 'uses' => 'DashboardController@index']);


/* Autres routes */
Route::get('/mon-profil', 'HomeController@showProfile')->name('mon.profil');
Route::get('/edit-profil', 'HomeController@showFormProfile')->name('edit.profile');
Route::post('/edit-profil', 'HomeController@editProfile')->name('edit.my.profile');
Route::get('/reset-password', 'HomeController@showFormPwd')->name('reset.password');
Route::post('/reset-password', 'HomeController@changePassword')->name('reset.my.password');
Route::get('/change-avatar', 'HomeController@showFormAvatar')->name('change.avatar');
Route::post('/change-avatar', 'HomeController@changeAvatar')->name('change.my.avatar');

Route::resource('/membre-cabinets', 'Commune\MembreCabinetController');