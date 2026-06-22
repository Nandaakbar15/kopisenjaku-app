<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginPage', [LoginController::class, 'login_page']);
Route::post('/handleLogin', [LoginController::class, 'handleLogin']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/home', [DashboardController::class, 'home'])->name('dashboard');

        Route::prefix('categories')->group(function () {
            Route::get('/categories_data', [CategoriesController::class, 'index']);
            Route::get('/add_categories_form', [CategoriesController::class, 'create']);
            Route::post('/add_categories', [CategoriesController::class, 'store']);
            Route::get('/edit_categories_form/{categories}', [CategoriesController::class, 'edit']);
            Route::put('/edit_categories/{categories}', [CategoriesController::class, 'update']);
            Route::delete('/delete_categories/{categories}', [CategoriesController::class, 'destroy']);
        });

        Route::prefix('menu')->group(function () {
            Route::get('/menu_data', [MenuController::class, 'index']);
            Route::get('/add_menu_form', [MenuController::class, 'create']);
            Route::post('/add_menu', [MenuController::class, 'store']);
            Route::get('/edit_menu_form/{menu}', [MenuController::class, 'edit']);
            Route::put('/edit_menu/{menu}', [MenuController::class, 'update']);
        });

        Route::prefix('galleries')->group(function () {
            Route::get('/galleries_data', [GalleriesController::class, 'index']);
            Route::get('/add_galleries_form', [GalleriesController::class, 'create']);
            Route::post('/add_galleries', [GalleriesController::class, 'store']);
        });

        Route::prefix('contacts')->group(function () {

        });
    });
});

Route::prefix('customer')->group(function () {
    Route::get('/home');
});
