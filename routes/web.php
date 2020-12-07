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

Route::get('/category/{name}', 'HomeController@category');
Route::get('/Event/{name}', 'HomeController@event');

Route::post('Registered/ruleCaptcha', 'front\registeredUserController@ruleCaptcha')->name('registered.ruleCaptcha');
Route::post('Registered', 'front\registeredUserController@registered')->name('registered.registered');

Route::get('/MyEvent', 'front\displayMyEventController@index')->name('myevent');

Route::get('/Profiles', 'Auth\ProfilesController@index')->name('myprofile');
Route::post('change-password', 'Auth\ProfilesController@updatePass')->name('myprofile.password');
Route::post('change-profiles', 'Auth\ProfilesController@updateProfiles')->name('myprofile.profile');

//admin
Route::get('/Category', 'admin\CategoryController@index')->name('category');
Route::post('Category/fetch_data/', 'admin\CategoryController@fetch_data')->name('category.fetch_data');
Route::post('Category/pagination_link', 'admin\CategoryController@pagination_link')->name('category.pagination_link');
Route::post('Category', 'admin\CategoryController@store')->name('category.store');
Route::post('Category/update', 'admin\CategoryController@update')->name('category.update');
Route::post('Category/del', 'admin\CategoryController@del')->name('category.category_del');

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

//Reports
Route::post('Report/registered', 'front\registeredUserController@report')->name('report.registered');
Route::post('Report/registered/pdf', 'front\registeredUserController@pdf')->name('report.registered.pdf');

//clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return route('home');
});