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

Route::get('/projects', 'ProjectsController@index')->name('projects_index');
Route::get('/projects/{project}', 'ProjectsController@edit')->name('project_edit');

Route::post('/projects/{project}/store', 'ProjectsController@update')->name('project_update');

Route::get('datatables', 'ProjectsController@pData');

Route::any('/{any}', function(){
	return view('error.404');
})->where('any', '.*');
