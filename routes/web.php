<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

Route::get('/', function () {
    return redirect('/url');
});
Route::get('/url', [UrlController::class, 'index'])->name('indexUrl');
Route::get('/url/create/{id}', [UrlController::class, 'create'])->name('createUrl');
Route::post('/url/create/{id}', [UrlController::class, 'save'])->name('createUrlSave');
Route::get('/url/show/{id}', [UrlController::class, 'show'])->name('createUrlShow');
