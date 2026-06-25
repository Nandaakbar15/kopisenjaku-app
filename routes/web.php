<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('customers');
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
            Route::get('/edit_galleries_form/{galleries}', [GalleriesController::class, 'edit']);
            Route::put('/edit_galleries/{galleries}', [GalleriesController::class, 'update']);
        });

        Route::prefix('contacts')->group(function () {
            Route::get('/contacts_data', [ContactsController::class, 'index']);
            Route::get('/add_contacts_form', [ContactsController::class, 'create']);
            Route::post('/add_contacts', [ContactsController::class, 'store']);
            Route::get('/edit_contacts_form/{contacts}', [ContactsController::class, 'edit']);
            Route::put('/edit_contacts/{contacts}', [ContactsController::class, 'update']);
            Route::delete('/delete_contacts/{contact}', [ContactsController::class, 'destroy']);
        });

        Route::prefix('reservations')->group(function () {
            Route::get('/reservations_data', [ReservationsController::class, 'index']);
            Route::get('/detail_reservations/{reservations}', [ReservationsController::class, 'show']);
            Route::delete('/delete_reservations/{reservations}', [ReservationsController::class, 'destroy']);
        });

        Route::prefix('orders')->group(function () {
            Route::get('/order_data', [OrdersController::class, 'index']);
            Route::get('/detail_orders/{orders}', [OrdersController::class, 'show']);
            Route::delete('/delete_orders/{orders}', [OrdersController::class, 'destroy']);
        });
    });
});

Route::prefix('customers')->group(function () {
    Route::get('/home', [CustomerController::class, 'home'])->name('customers');
    Route::get('/menu', [CustomerController::class, 'menu']);
    Route::get('/detailMenu/{menu}', [CustomerController::class, 'detailMenu']);
    Route::get('/galleries', [CustomerController::class, 'galleries']);
    Route::get('/contacts', [CustomerController::class, 'contacts']);
});
