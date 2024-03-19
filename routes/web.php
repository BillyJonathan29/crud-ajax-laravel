<?php

use App\Http\Controllers\pegawaiAjaxController;
use App\Http\Controllers\productAjaxController;
use App\Http\Controllers\userAjaxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\pegawai;
use App\Models\Product;
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
    return view('welcome', [
        'product' => Product::all()
    ]);
});

    Route::get('dataPegawai', function(){
        return view('pegawai.index');
    });

    Route::get('dataProduct', function(){
        return view('product.index', [
            'pegawai' => pegawai::all()
        ]);
    });

    Route::get('dataUser', function(){
        return view('user.index');
    });
    Route::get('login', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('logout', [LoginController::class, 'logout']);
    // register
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);
    // dashboard

    Route::prefix('pegawai')->group(function(){
        Route::get('', [pegawaiAjaxController::class, 'index'])->name('pegawai');
        Route::get('create', [pegawaiAjaxController::class, 'create'])->name('pegawai.create');
        Route::post('store', [pegawaiAjaxController::class, 'store'])->name('pegawai.store');
        Route::get('{pegawai}/edit', [pegawaiAjaxController::class, 'edit'])->name('pegawai.edit');
        Route::put('{pegawai}/update', [pegawaiAjaxController::class, 'update'])->name('pegawai.update');
        Route::delete('{pegawai}/destroy', [pegawaiAjaxController::class, 'destroy'])->name('pegawai.destroy');

    });
    Route::prefix('product')->group(function(){
        Route::get('', [productAjaxController::class, 'index'])->name('product');
        Route::get('create', [productAjaxController::class, 'create'])->name('product.create');
        Route::post('store', [productAjaxController::class, 'store'])->name('product.store');
        Route::get('{product}/edit', [productAjaxController::class, 'edit'])->name('product.edit');
        Route::put('{product}/update', [productAjaxController::class, 'update'])->name('product.update');
        Route::delete('{product}/destroy', [productAjaxController::class, 'destroy'])->name('product.destroy');

    });

    Route::prefix('user')->group(function(){
        Route::get('', [userAjaxController::class, 'index'])->name('user');
        Route::get('create', [userAjaxController::class, 'create'])->name('user.create');
        Route::post('store', [userAjaxController::class, 'store'])->name('user.store');
        Route::get('{user}/edit', [userAjaxController::class, 'edit'])->name('user.edit');
        Route::put('{user}/update', [userAjaxController::class, 'update'])->name('user.update');
        Route::delete('{user}/destroy', [userAjaxController::class, 'destroy'])->name('user.destroy');

    });

    // Route::resource('pegawaiAjax', pegawaiAjaxController::class);
    // Route::resource('productAjax', productAjaxController::class);






