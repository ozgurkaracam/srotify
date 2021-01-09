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

Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
Route::get('/exceldeneme',[\App\Http\Controllers\DashboardController::class,'exceldeneme']);
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/exports',[\App\Http\Controllers\DashboardController::class,'export'])->name('export');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('stories',\App\Http\Controllers\StoryController::class);
});

Route::middleware(['auth','isAdmin'])->namespace('Admin')->prefix('admin')->group(function(){
    Route::get('deletedStories',[App\Http\Controllers\Admin\StoriesController::class,'index'])->name('deletedstories');
    Route::get('savedeleted/{id}',[\App\Http\Controllers\Admin\StoriesController::class,'savedeleted'])->name('savedeleted');
    Route::get('/',[\App\Http\Controllers\Admin\StoriesController::class,'allstories'])->name('allstories');
});
