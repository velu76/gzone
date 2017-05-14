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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

// Users Routes
Route::get('/users', 'UsersController@index')->name('users_index');
Route::get('/users/create', 'UsersController@create')->name('user_create');

// Ajax pulls for the Users Table
Route::get('udata', 'UsersController@uData');

// Project Routes
Route::get('/projects', 'ProjectsController@index')->name('projects_index');
Route::get('/projects/create', 'ProjectsController@create')->name('project_create');
Route::get('/projects/{project}', 'ProjectsController@edit')->name('project_edit');
Route::get('/projects/delete/{project}', 'ProjectsController@destroy')->name('project_delete');

Route::post('/project/create', 'ProjectsController@store')->name('project_store');
Route::post('/projects/{project}/store', 'ProjectsController@update')->name('project_update');

// Ajax pulls for Projects Table
Route::get('datatables', 'ProjectsController@pData');

// Custom 404 for dev environment. To change to proper 404 in prod
Route::any('/{any}', function(){
	return view('error.404');
})->where('any', '.*');
