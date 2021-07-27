<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbieController;
use App\Http\Controllers\AlbumController;

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

Route::resource('/hobbies', HobbieController::class);

Route::get('/hobbies/{id}/confirmDelete', [HobbieController::class, 'delete']);

Route::get('/albums', [AlbumController::class, 'index']);
