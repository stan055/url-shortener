<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
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


Route::post('/shorten', [ShortUrlController::class, 'shorten'])->name('shorten');
Route::get('/{code}', [ShortUrlController::class, 'redirect301'])->name('redirect301');