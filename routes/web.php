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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/students', [App\Http\Controllers\StudentsController::class, 'students'])->name('students');
Route::get('/profile/{student}', [App\Http\Controllers\StudentsController::class, 'show'])->name('profile.show');
Route::get('/profileedit/{student}', 'App\Http\Controllers\StudentsController@edit')->name('profile.edit');
Route::patch('/profile/{student}', 'App\Http\Controllers\StudentsController@update')->name('profile.update');
Route::get('/students/export', 'App\Http\Controllers\StudentsController@export')->name('students.export');

Route::get('/students/create', 'App\Http\Controllers\StudentsController@create')->name('students.create');
Route::post('/students/store', 'App\Http\Controllers\StudentsController@store')->name('students.store');


Route::get('/students/delete', [App\Http\Controllers\StudentsController::class, 'delete'])->name('students.delete');
Route::delete('/students/{student}', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('students.destroy');

