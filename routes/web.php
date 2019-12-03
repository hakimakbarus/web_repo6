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
    return view('index');
});

Route::get('/home', 'HomeController@home');

// Route::resource('/upload', 'UploadsController');
Route::get('/upload', 'UploadsController@index')->middleware('auth');
Route::get('/upload/create', 'UploadsController@create')->middleware('auth');
Route::post('/upload/store', 'UploadsController@store')->middleware('auth');
Route::get('/upload/{id}/show', 'UploadsController@show')->middleware('auth');
Route::get('/upload/{id}/edit', 'UploadsController@edit')->middleware('auth');
Route::post('/upload/{id}/update', 'UploadsController@update')->middleware('auth');
Route::post('/upload/{id}/destroy', 'UploadsController@destroy')->middleware('auth');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');

Route::get('/logout', 'AuthController@logout');

Route::get('/registrasi', 'RegistrasiController@create');
Route::post('register', 'RegistrasiController@store');

Route::get('/home', 'HomeController@home');
Route::get('/home/{id}/showUpload', 'HomeController@showHome');
Route::get('/home/{id}/downloadUpload', 'HomeController@downloadHome');

Route::get('/dashboardUser/home', 'HomeController@homeUser')->middleware('auth');
Route::get('/dashboardUser/home/{id}/showUpload', 'HomeController@showUser')->middleware('auth');
Route::get('/dashboardUser/home/{id}/downloadUpload', 'HomeController@downloadUser')->middleware('auth');

Route::get('/dashboardAdmin/home', 'HomeController@homeAdmin')->middleware('auth');
Route::get('/dashboardAdmin/home/{id}/showUpload', 'HomeController@showAdmin')->middleware('auth');
Route::get('/dashboardAdmin/home/{id}/downloadUpload', 'HomeController@downloadAdmin')->middleware('auth');

Route::get('/dashboardAdmin', 'DashboardAdminController@index')->middleware('auth');
// Route::get('/dashboardAdmin/home', 'DashboardAdminController@home')->middleware('auth');
Route::get('/dashboardAdmin/{id}/profile', 'DashboardAdminController@showProfile')->middleware('auth');

Route::get('/dashboardAdmin/upload', 'UploadsController@indexAdmin')->middleware('auth');
Route::get('/dashboardAdmin/upload/create', 'UploadsController@createAdmin')->middleware('auth');
Route::post('/dashboardAdmin/upload/store', 'UploadsController@storeAdmin')->middleware('auth');
Route::get('/dashboardAdmin/upload/{id}/show', 'UploadsController@showAdmin')->middleware('auth');
Route::get('/dashboardAdmin/upload/{id}/edit', 'UploadsController@editAdmin')->middleware('auth');
Route::post('/dashboardAdmin/upload/{id}/update', 'UploadsController@updateAdmin')->middleware('auth');
Route::post('/dashboardAdmin/upload/{id}/destroy', 'UploadsController@destroyAdmin')->middleware('auth');
Route::get('/dashboardAdmin/category', 'CategoriesController@index')->middleware('auth');
Route::get('/dashboardAdmin/category/create', 'CategoriesController@create')->middleware('auth');
Route::post('/dashboardAdmin/category/store', 'CategoriesController@store')->middleware('auth');
Route::get('/dashboardAdmin/category/{id}/show', 'CategoriesController@show')->middleware('auth');
Route::get('/dashboardAdmin/category/{id}/edit', 'CategoriesController@edit')->middleware('auth');
Route::post('/dashboardAdmin/category/{id}/update', 'CategoriesController@update')->middleware('auth');
Route::post('/dashboardAdmin/category/{id}/destroy', 'CategoriesController@destroy')->middleware('auth');



Route::post('/user/{id}/update', 'UsersController@update')->middleware('auth');

Route::get('/dashboardUser', 'DashboardUserController@index')->middleware('auth');
// Route::get('/dashboardUser/home', 'DashboardUserController@home')->middleware('auth');
Route::get('/dashboardUser/{id}/profile', 'DashboardUserController@showProfile')->middleware('auth');

Route::get('/dashboardUser/{id_user}/upload', 'UploadsController@indexUser')->middleware('auth');
Route::get('/dashboardUser/{id_user}/upload/create', 'UploadsController@createUser')->middleware('auth');
Route::post('/dashboardUser/{id_user}/upload/store', 'UploadsController@storeUser')->middleware('auth');
Route::get('/dashboardUser/{id_user}/upload/{id}/show', 'UploadsController@showUser')->middleware('auth');
Route::get('/dashboardUser/{id_user}/upload/{id}/edit', 'UploadsController@editUser')->middleware('auth');
Route::post('/dashboardUser/{id_user}/upload/{id}/update', 'UploadsController@updateUser')->middleware('auth');
Route::post('/dashboardUser/{id_user}/upload/{id}/destroy', 'UploadsController@destroyUser')->middleware('auth');

Route::get('home/{id}/show', 'UploadsController@show');

Route::get('browse/year', 'BrowseController@indexYearHome');
Route::post('browse/year/byYear', 'BrowseController@catchYearHome');
Route::get('browse/year/{year}/show', 'BrowseController@browseByYearHome');

Route::get('browse/category', 'BrowseController@indexCategoryHome');
Route::post('browse/category/byCategory', 'BrowseController@catchCategoryHome');
Route::get('browse/category/{category}/show', 'BrowseController@browseByCategoryHome');


Route::get('dashboardUser/browse/year', 'BrowseController@indexYearUser')->middleware('auth');
Route::post('dashboardUser/browse/year/byYear', 'BrowseController@catchYearUser')->middleware('auth');
Route::get('dashboardUser/browse/year/{year}/show', 'BrowseController@browseByYearUser')->middleware('auth');

Route::get('dashboardUser/browse/category', 'BrowseController@indexCategoryUser')->middleware('auth');
Route::post('dashboardUser/browse/category/byCategory', 'BrowseController@catchCategoryUser')->middleware('auth');
Route::get('dashboardUser/browse/category/{category}/show', 'BrowseController@browseByCategoryUser')->middleware('auth');


Route::get('dashboardAdmin/browse/year', 'BrowseController@indexYearAdmin')->middleware('auth');
Route::post('dashboardAdmin/browse/year/byYear', 'BrowseController@catchYearAdmin')->middleware('auth');
Route::get('dashboardAdmin/browse/year/{year}/show', 'BrowseController@browseByYearAdmin')->middleware('auth');

Route::get('dashboardAdmin/browse/category', 'BrowseController@indexCategoryAdmin')->middleware('auth');
Route::post('dashboardAdmin/browse/category/byCategory', 'BrowseController@catchCategoryAdmin')->middleware('auth');
Route::get('dashboardAdmin/browse/category/{category}/show', 'BrowseController@browseByCategoryAdmin')->middleware('auth');