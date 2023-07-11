<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;
use App\http\Controllers\HomeController;
use App\http\Controllers\usercontroller;

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
    return view('auth.login&register');
});

Auth::routes();

// files

Route::get('/home', [HomeController::class, 'index'])->name('home');
// private files
Route::get('/myfiles', [FilesController::class, 'index'])->name('file.index');
// public files
Route::get('/publicfiles', [FilesController::class, 'publicfiles'])->name('file.public');
Route::get('/showpublicfiles/{id}', [FilesController::class, 'showpublic'])->name('file.showpublic');
Route::get('/changestatus/{id}', [FilesController::class, 'changestatus'])->name('file.changestatus');
// add
Route::get('/addfile', [FilesController::class, 'create'])->name('file.create');
Route::post('/store', [FilesController::class, 'store'])->name('file.store');
// delete
Route::Get('/delete/{id}', [FilesController::class, 'destroy'])->name('file.destroy');
// update
Route::Get('/edit/{id}', [FilesController::class,'edit'])->name('file.edit');
Route::post('/update/{id}', [FilesController::class, 'update'])->name('file.update');
// show
Route::get('/show/{id}', [FilesController::class, 'show'])->name('file.show');
Route::get('/download/{id}', [FilesController::class, 'download'])->name('file.download');

// user

Route::get('/profile', [usercontroller::class, 'profile'])->name('user.profile');







