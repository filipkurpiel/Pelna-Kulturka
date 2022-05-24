<?php

use App\Http\Controllers\ArtykulController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
#
//Pokazywanie snippetów w indexie
Route::get('/',[ArtykulController::class,'pokazsnippet'])->name('images.view');
//Wyświetlanie pojedyńczego artykułu
Route::get('artykul/{id}', [ArtykulController::class,'pokazartykul'])->name('article.view');
//Tworzenie artykułu
Route::post('ZapiszArtykul', [ArtykulController::class, "ZapiszArtykul"]);

Route::get('/login', function (){
  return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
