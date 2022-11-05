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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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



// tache route

Route::post('/tache-store', [App\Http\Controllers\TacheController::class, 'store'])->name('tacheStore');
Route::get('/tache-create', [App\Http\Controllers\TacheController::class, 'create'])->name('tacheCreate');
Route::get('/tache-edit', [App\Http\Controllers\TacheController::class, 'edit'])->name('tacheEdit');
Route::get('/tache-index', [App\Http\Controllers\TacheController::class, 'index'])->name('tacheIndex');
Route::put('/tache/update', [App\Http\Controllers\TacheController::class, 'update'])->name('tacheUpdate');
Route::delete('/tache/delete', [App\Http\Controllers\TacheController::class, 'destroy'])->name('tacheDelete');

// board route

Route::get('/kanban', [App\Http\Controllers\BoardController::class, 'index'])->name('kanbanIndex');
Route::get('/board/edit', [App\Http\Controllers\BoardController::class, 'edit'])->name('boardEdit');
Route::put('/board/update', [App\Http\Controllers\BoardController::class, 'update'])->name('boardUpdate');
Route::get('/board-create', [App\Http\Controllers\BoardController::class, 'create'])->name('boardCreate');
Route::post('/board-store', [App\Http\Controllers\BoardController::class, 'store'])->name('boardStore');
Route::delete('/board-delete', [App\Http\Controllers\BoardController::class, 'destroy'])->name('boardDelete');

// soustache route
Route::get('/soustache-create', [App\Http\Controllers\SoustacheController::class, 'create'])->name('soustacheCreate');
Route::post('/soustache-store', [App\Http\Controllers\SoustacheController::class, 'store'])->name('soustacheStore');
