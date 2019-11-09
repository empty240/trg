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
})->name('home');

Route::resource('staffs', 'StaffsController');

Route::get('/top/{factory_no?}', 'TopsController@index')->name('top');
Route::get('/daily-reports/{staff_id?}', 'DailyReportsController@index')->name('daily-reports');
Route::post('/daily-reports/{staff_id?}', 'DailyReportsController@date')->name('daily-reports-date');
Route::post('/daily-reports/edit-work-schedule/edit', 'DailyReportsController@editWorkSchedule')->name('daily-reports-edit');
