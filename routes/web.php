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
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/positions', 'PositionController@index')->name('positions');
Route::get('/employees/add', 'EmployeeController@add')->name('employee-add');
Route::post('/employees', 'EmployeeController@create')->name('employees-create');
Route::get('/user-data', function() {
    $collection = App\Employee::all();

    return (new \Yajra\DataTables\CollectionDataTable($collection))->toJson();
});

