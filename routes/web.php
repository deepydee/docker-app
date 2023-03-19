<?php

use App\Http\Controllers\PodcastController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    app('log')->info('Welcome');
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World!';
});

Route::get('/hi', function () {
    return 'Hi';
});

Route::get('/podcasts', [PodcastController::class, 'index']);
