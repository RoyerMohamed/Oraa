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

Route::get('/', [App\Http\Controllers\ProjetController::class, 'index'])->name('projet');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes profil
Route::get('/profil', [App\Http\Controllers\UserController::class, 'index'])->name('profil');
Route::get('/profil-edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profil_edit');
Route::put('/profil-updateInfos', [App\Http\Controllers\UserController::class, 'updateInfos'])->name('updateInfos');
Route::put('/profil-updatepassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('updatepassword');
// routes projet 
Route::get('/projet', [App\Http\Controllers\ProjetController::class, 'index'])->name('projet');
Route::get('/projet-create', [App\Http\Controllers\ProjetController::class, 'create'])->name('projetCreate');
Route::post('/projet-store', [App\Http\Controllers\ProjetController::class, 'store'])->name('projetStore');
Route::delete('/projet-destroy', [App\Http\Controllers\ProjetController::class, 'destroy'])->name('projetDestroy');
Route::get('/projet-show', [App\Http\Controllers\ProjetController::class, 'show'])->name('projetShow');
Route::get('/projet-edit', [App\Http\Controllers\ProjetController::class, 'edit'])->name('projetEdit');
Route::put('/projet-update', [App\Http\Controllers\ProjetController::class, 'update'])->name('projetUpdate');
Route::delete('/projet-deleteUser', [App\Http\Controllers\ProjetController::class, 'deleteProjectUser'])->name('deleteProjectUser');
// route message 
Route::post('/message-store', [App\Http\Controllers\MessageController::class, 'store'])->name('messageStore');
Route::delete('/message-destroy', [App\Http\Controllers\MessageController::class, 'destroy'])->name('messageDestroy');
Route::get('/message-edit', [App\Http\Controllers\MessageController::class, 'edit'])->name('messageEdit');
Route::put('/message-update', [App\Http\Controllers\MessageController::class, 'update'])->name('messageUpdate');

// board route 

Route::get('/kanban', [App\Http\Controllers\BoardController::class, 'index'])->name('kanbanIndex');
