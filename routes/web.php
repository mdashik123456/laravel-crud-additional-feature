<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'index']);
Route::get('/updatePage/{id}', [SiteController::class, 'updatePage']);
Route::get('/delete/{id}', [SiteController::class, 'delete']);
Route::get('/trashPage', [SiteController::class, 'trashPage']);
Route::get('/trashPage/delete/{id}', [SiteController::class, 'trashPageDelete']);
Route::get('/trashPage/restore/{id}', [SiteController::class, 'trashPageRestore']);


Route::post('/update/{id}', [SiteController::class, 'update']);
Route::post('/', [SiteController::class, 'insert']);



