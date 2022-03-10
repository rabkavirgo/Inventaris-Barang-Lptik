<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuangController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    return view('layouts/layout');
});

/* Route::group(['prefix'  => 'barang/'],function(){
    Route::get('barang','BarangController@index');


    }); */
    
    Route::group(['prefix'  => 'dashboard/'],function(){
        Route::get('/',[BarangController::class, 'dashboard'])->name('barang.dashboard');
      
    });

    Route::group(['prefix'  => 'barang/'],function(){
        Route::get('/',[BarangController::class, 'index'])->name('barang');
        Route::get('/add',[BarangController::class, 'add'])->name('barang.add');
        Route::post('/post',[BarangController::class, 'post'])->name('barang.post');
        Route::get('{id}/edit',[BarangController::class, 'edit'])->name('barang.edit');
        Route::patch('update/{id}',[BarangController::class, 'update'])->name('barang.update');
        Route::delete('/delete/{id}',[BarangController::class, 'delete'])->name('barang.delete');
    });

    Route::group(['prefix'  => 'ruang/'],function(){
        Route::get('/',[RuangController::class, 'index'])->name('ruang');
        Route::get('/add',[RuangController::class, 'add'])->name('ruang.add');
        Route::post('/post',[RuangController::class, 'post'])->name('ruang.post');
        Route::get('{id}/edit',[RuangController::class, 'edit'])->name('ruang.edit');
        Route::patch('update/{id}',[RuangController::class, 'update'])->name('ruang.update');
        Route::delete('/delete/{id}',[RuangController::class, 'delete'])->name('ruang.delete');
    });
    
    
/*
    Route::group(['prefix' => 'barang'], function(){
        Route::get('/','BarangController@index')->name('barang');
        Route::post('/','BarangController@post')->name('barang.add');
    });