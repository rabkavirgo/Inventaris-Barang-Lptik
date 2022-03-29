<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PenanggungJawabController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\Pj\BarangPjController;
use App\Http\Controllers\Pj\DashboardPjController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
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
        Route::get('/',[BarangController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/pj',[BarangController::class,'pj'])->name('barang.pj');
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

    Route::group(['prefix'  => 'penanggung_jawab/'],function(){
        Route::get('/',[PenanggungJawabController::class, 'index'])->name('pj');
        Route::get('/add',[PenanggungJawabController::class, 'add'])->name('pj.add');
        Route::post('/post',[PenanggungJawabController::class, 'post'])->name('pj.post');
        Route::get('{id}/edit',[PenanggungJawabController::class, 'edit'])->name('pj.edit');
        Route::patch('update/{id}',[PenanggungJawabController::class, 'update'])->name('pj.update');
        Route::delete('/delete/{id}',[PenanggungJawabController::class, 'delete'])->name('pj.delete');
    });

    Route::group(['prefix'  => 'laporan/'],function(){
        Route::get('/',[LaporanController::class, 'index'])->name('laporan');
        Route::post('/cari',[LaporanController::class, 'cari'])->name('laporan.cari');
    });



    Route::group(['prefix'  => 'penanggung_jawab/'],function(){
        Route::get('/dashboard',[DashboardPjController::class, 'dashboard'])->name('pj.dashboard');

        Route::group(['prefix'  => 'barang/'],function(){
            Route::get('/',[BarangPjController::class, 'index'])->name('pj.barang');
            Route::get('/add',[BarangPjController::class, 'add'])->name('pj.barang.add');
            Route::post('/post',[BarangPjController::class, 'post'])->name('pj.barang.post');
            Route::get('{id}/edit',[BarangPjController::class, 'edit'])->name('pj.barang.edit');
            Route::patch('update/{id}',[BarangPjController::class, 'update'])->name('pj.barang.update');
            Route::delete('/delete/{id}',[BarangPjController::class, 'delete'])->name('pj.barang.delete');
        });
    });

    Route::group(['prefix'  => 'pinjam/'],function(){
        Route::get('/',[PeminjamanController::class, 'index'])->name('pinjam');
        Route::get('/add',[PeminjamanController::class, 'add'])->name('pinjam.add');
        Route::post('/post',[PeminjamanController::class, 'post'])->name('pinjam.post');
        Route::get('{id}/edit',[PeminjamanController::class, 'edit'])->name('pinjam.edit');
        Route::patch('update/{id}',[PeminjamanController::class, 'update'])->name('pinjam.update');
        Route::delete('/delete/{id}',[PeminjamanController::class, 'delete'])->name('pinjam.delete');
    });

    Route::group(['prefix'  => 'perbaikan/'],function(){
        Route::get('/',[PerbaikanController::class, 'index'])->name('perbaikan');
        Route::get('/add',[PerbaikanController::class, 'add'])->name('perbaikan.add');
        Route::post('/post',[PerbaikanController::class, 'post'])->name('perbaikan.post');
        Route::get('{id}/edit',[PerbaikanController::class, 'edit'])->name('perbaikan.edit');
        Route::patch('update/{id}',[PerbaikanController::class, 'update'])->name('perbaikan.update');
        Route::delete('/delete/{id}',[PerbaikanController::class, 'delete'])->name('perbaikan.delete');
    });

