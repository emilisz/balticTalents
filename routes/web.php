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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'groups' => 'GroupController',
    'courses' => 'CourseController',
    'groups.lectures' => 'LectureController',
    'downloads' => 'DownloadController',
    'users' => 'UserController',
    'profiles' => 'ProfileController',
    'groups.notifications' => 'NotificationController',
    'groups.lectures.files'=> 'FileController'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
