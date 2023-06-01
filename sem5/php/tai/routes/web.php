<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
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



Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/comments',[CommentsController::class,'index'])->name('comments');
Route::get('/create',[CommentsController::class,'create'])->name('create');
Route::post('/create',[CommentsController::class,'store'])->name('store');

Route::get('/delete/{id}',
[CommentsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [CommentsController::class,'edit'])->name('edit');
Route::put('/update/{id}', [CommentsController::class,'update'])->name('update');


Route::get('/orders',[OrdersController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
