<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

//front
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/welcome', 'HomeController@index')->name('welcome');

//admin
Route::get('/Permissions', 'admin\PermissionsController@index')->name('permissions');
Route::post('Permissions/fetch_data/', 'admin\PermissionsController@fetch_data')->name('permissions.fetch_data');
Route::post('Permissions/pagination_link', 'admin\PermissionsController@pagination_link')->name('permissions.pagination_link');
Route::post('Permissions/change_status', 'admin\PermissionsController@change_status')->name('permissions.change_status');

//SU
Route::get('/CalendarEvent', 'admin\calendarEventController@index')->name('calendarEvent');
Route::post('CalendarEvent/fetch_data/', 'admin\calendarEventController@fetch_data')->name('calendarEvent.fetch_data');
Route::post('CalendarEvent/pagination_link', 'admin\calendarEventController@pagination_link')->name('calendarEvent.pagination_link');
Route::post('CalendarEvent', 'admin\calendarEventController@store')->name('calendarEvent.store');
Route::post('CalendarEvent/update', 'admin\calendarEventController@update')->name('calendarEvent.update');
Route::post('CalendarEvent/del', 'admin\calendarEventController@del')->name('calendarEvent.calendarEvent_del');


//clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return route('home');
});