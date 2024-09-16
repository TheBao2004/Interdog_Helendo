<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\VariantController;
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
    return view('layout.admin');
});

Route::prefix('/admin')->name('admin.')->group(function () {

    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');

    Route::prefix('/category')->name('category.')->group(function () {

        Route::get('/{id?}', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('add');
        Route::put('/{id?}', [CategoryController::class, 'update'])->name('edit');
        Route::delete('/{id?}', [CategoryController::class, 'delete'])->name('delete');

    });

    Route::prefix('/keyword')->name('keyword.')->group(function () {

        Route::get('/{id?}', [KeywordController::class, 'index'])->name('index');
        Route::post('/', [KeywordController::class, 'store'])->name('add');
        Route::put('/{id?}', [KeywordController::class, 'update'])->name('edit');
        Route::delete('/{id?}', [KeywordController::class, 'delete'])->name('delete');

    });

    Route::prefix('/color')->name('color.')->group(function () {

        Route::get('/{id?}', [ColorController::class, 'index'])->name('index');
        Route::post('/', [ColorController::class, 'store'])->name('add');
        Route::put('/{id?}', [ColorController::class, 'update'])->name('edit');
        Route::delete('/{id?}', [ColorController::class, 'delete'])->name('delete');

    });

    Route::prefix('/size')->name('size.')->group(function () {

        Route::get('/{id?}', [SizeController::class, 'index'])->name('index');
        Route::post('/', [SizeController::class, 'store'])->name('add');
        Route::put('/{id?}', [SizeController::class, 'update'])->name('edit');
        Route::delete('/{id?}', [SizeController::class, 'delete'])->name('delete');

    });

    Route::prefix('/product')->name('product.')->group(function () {

        Route::get('/{id?}', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('add');
        Route::put('/{id?}', [ProductController::class, 'update'])->name('edit');
        Route::delete('/{id?}', [ProductController::class, 'delete'])->name('delete');

    });

    Route::prefix('/file')->name('file.')->group(function () {

        Route::get('/', [FileController::class, 'index'])->name('index');
        Route::post('/', [FileController::class, 'upload'])->name('upload');
        Route::get('/{path}', [FileController::class, 'delete'])->where('path', '.*')->name('delete');

    });

    Route::prefix('/variant')->name('variant.')->group(function () {

        Route::get('/{id?}/{ma?}', [VariantController::class, 'index'])->name('index');
        Route::post('/{id?}', [VariantController::class, 'store'])->name('add');
        Route::put('/{id?}/{ma?}', [VariantController::class, 'update'])->name('edit');
        Route::delete('/{id?}/{ma?}', [VariantController::class, 'delete'])->name('delete');

    });

});

