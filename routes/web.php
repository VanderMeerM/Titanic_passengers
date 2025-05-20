<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return redirect()->route('all.index');
});

Route::get('/all', function() {
  return redirect()->route('all.index');
});
Route::post('/all', action: [SessionController::class, 'store'])->name('all.index');


Route::get('/passengers', function () {
  return redirect()->route('all.index')
  ->name('passengers.index');
});

Route::get('/crew', function () {
  return redirect()->route('all.index')
  -> name('crew.index');
 });


Route::get('/login', [SessionController::class, 'create'])->name('auth.login');
Route::post('/login', action: [SessionController::class, 'store'])->name('auth.login');


Route::post('/logout', [SessionController::class, 'destroy'])->name('auth.logout');


 Route::resource('all', PassengerController::class)
->only(['index', 'show', 'store']);

Route::resource('passengers', PassengerController::class)
->only(['index', 'show', 'store']);

Route::resource('crew', PassengerController::class)
->only(['index', 'show', 'store']);

Route::post('upload', [FileUploadController::class, 'store'])->name('file.store');

Route::get('update_show', [UserController::class, 'show'])-> name('user.show');
Route::post('update_user', [UserController::class, 'update'])-> name('user.update');

  
    

