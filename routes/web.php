<?php

use App\Http\Controllers\TodolistController;
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
return view('welcome');
});
Route::prefix('todolist')->group(function(){
  Route::get('/',[TodolistController::class,'index'])->name(name: 'todolist.index');
  Route::post('/save',[TodolistController::class,'store'])->name('todolist.store');
  Route::get('/edit/{id}',[TodolistController::class,'edit'])->name('todolist.edit');
  Route::put('/update/{id}',[TodolistController::class,'update'])->name('todolist.update');
  Route::put('/status/{id}',[TodolistController::class,'set_status'])->name('todolist.set_status');
  Route::delete('/delete/{id}',[TodolistController::class,'destroy'])->name('todolist.destroy');
});

