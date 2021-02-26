<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [DashboardController::class, 'index']);

//user routes
Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/add', [UsersController::class, 'add']);
Route::get('/users/edit/{id}', [UsersController::class, 'edit']);
Route::post('/users/add', [UsersController::class, 'add']);
Route::post('/users/edit', [UsersController::class, 'edit']);
Route::post('/users/delete', [UsersController::class, 'delete']);

//projects routes
Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/projects/add', [ProjectsController::class, 'add']);
Route::post('/projects/add', [ProjectsController::class, 'add']);
Route::post('/projects/edit', [ProjectsController::class, 'edit']);
Route::get('/projects/edit/{id}', [ProjectsController::class, 'edit']);
Route::get('/projects/delete/{id}', [ProjectsController::class, 'destroy']);

//send mail route
Route::get('/send-mail', function ()
{
	$details = [
		'title' => 'Mail from Laravel 8',
		'body'  => 'This is for testing email using smtp'
	];
	\Mail::to('bdp@narola.email')->send(new \App\Mail\MyMail($details));
	dd('Email is Sent.');
});

Route::get('logout', function ()
{
	session()->flush(); // completely remove sesssion data.

	return redirect('users');
});
