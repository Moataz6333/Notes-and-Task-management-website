<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DashboardController;


Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('user.check');
Route::get('/signUp',[AuthController::class,'signUp'])->name('user.singUp');
Route::post('/signUp',[AuthController::class,'store'])->name('user.store');
Route::get('/',[NoteController::class,'welcome'])->name('notes.welcome');
Route::get('/logout',function(){
   auth()->logout();
   return to_route('notes.welcome');
})->name('logout')->middleware('auth');



Route::middleware('auth:sanctum')->group(function(){
   Route::get('/dashboard',[NoteController::class,'dashboard'])->name('notes.dashboard');
   Route::put('/dashboard/{note}',[NoteController::class,'done'])->name('notes.done');
Route::get('/create',[NoteController::class,'create'])->name('notes.create');
Route::get('/profile',[NoteController::class,'profile'])->name('notes.profile');
Route::get('/history',[NoteController::class,'history'])->name('notes.history');
Route::post('/history',[NoteController::class,'deleteAll'])->name('notes.deleteAll');
Route::post('/create',[NoteController::class,'store'])->name('notes.store');
Route::get('/change-password',[NoteController::class,'changePass'])->name('notes.changePass');
Route::put('/change-password',[NoteController::class,'UpdatePass'])->name('notes.NewPassword');
Route::get('/edit/{note}',[NoteController::class,'edit'])->name('notes.edit');
Route::post('/edit/{note}',[NoteController::class,'update'])->name('notes.update');
Route::delete('/delete/{note}',[NoteController::class,'delete'])->name('notes.delete');
Route::get('/show/{note}',[NoteController::class,'show'])->name('notes.show');
});

