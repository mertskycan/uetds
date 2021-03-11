<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test', 'MainController@index');
Route::resource('yuk', 'YukController');
Route::post('yuk/check', 'YukController@checkData')->name('yuk.check');
Route::post('excel/yuk', 'YukController@excelYuk')->name('excel.yuk');
Route::get('yuk-datatable', 'YukController@datatable')->name('yuk.list');
Route::resource('sefer', 'SeferController');
Route::resource('plaka', 'PlakaController');
Route::resource('sofor', 'SoforController');
Route::resource('company', CompanyController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
