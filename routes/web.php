<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;


use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\CarttController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\registerController;





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
Route::get('/login', [LoginController::class, 'show_login'])->name('login');
Route::post('/login', [LoginController::class, 'check_login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show_register'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.home');
    });
    Route::get('cate', [CateController::class, 'list'])->name('cate.list');
    Route::get('cate-add', [CateController::class, 'add'])->name('cate.add');
    Route::post('cate-add', [CateController::class, 'store'])->name('cate.store');
    Route::get('cate-edit/{id}', [CateController::class, 'edit'])->name('cate.edit');
    Route::put('cate-edit/{id}/update', [CateController::class, 'update'])->name('cate.update');
    Route::get('cate-delete/{id}', [CateController::class, 'delete'])->name('cate.delete');

    Route::get('km', [SaleController::class, 'list'])->name('km.list');
    Route::get('km-add', [SaleController::class, 'add'])->name('km.add');
    Route::post('km-add', [SaleController::class, 'store'])->name('km.store');
    Route::get('km-edit/{id}', [SaleController::class, 'edit'])->name('km.edit');
    Route::put('km-edit/{id}/update', [SaleController::class, 'update'])->name('km.update');

    Route::get('km-delete/{id}', [SaleController::class, 'delete'])->name('km.delete');
    Route::get('ban', [BannerController::class, 'show'])->name('ban.show');
    Route::get('ban-add', [BannerController::class, 'add'])->name('ban.add');
    Route::post('ban-add', [BannerController::class, 'store'])->name('ban.store');
    Route::get('ban-edit/{id}', [BannerController::class, 'edit'])->name('ban.edit');
    Route::put('ban-update/{id}', [BannerController::class, 'update'])->name('ban.update');
   
    Route::get('ban-delete/{id}', [BannerController::class, 'delete'])->name('ban.delete');
    Route::get('cartt', [CarttController::class, 'show'])->name('cartt.show');
    Route::get('cartt-edit/{id}', [CarttController::class, 'edit'])->name('cartt.edit');
    Route::put('cartt-edit/{id}', [CarttController::class, 'update'])->name('cartt.update');
    Route::get('cartt-detail/{id}', [CarttController::class, 'detail'])->name('cartt.detail');
    Route::get('carss', [carsController::class, 'show'])->name('carss.show');
    Route::get('carss-add', [carsController::class, 'add'])->name('carss.add');
    Route::post('carss-add', [carsController::class, 'store'])->name('carss.store');
    Route::get('carss-edit/{id}', [CarsController::class, 'edit'])->name('carss.edit');
    Route::put('carss-update/{id}', [CarsController::class, 'update'])->name('carss.update');
    Route::get('carss-delete/{id}', [carsController::class, 'delete'])->name('carss.delete');

    Route::get('cartt-print/{id}', [CarttController::class, 'printInvoice'])->name('cartt.print');

});
//
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home-car',[CarController::class,'list'])->name('home-car.list');
// Route::get('/home-car/{id}', [CarController::class, 'show'])->name('home-car.show');
Route::resource('cars', CarController::class);

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart-add', [CartController::class, 'add_cart'])->name('cart.add');

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.updateCart');

Route::get('/cart/remove/{carId}', [CartController::class, 'removeItem'])->name('cart.removeItem');

Route::get('/cart/checkout', [CartController::class, 'checkoutForm'])->name('cart.checkoutForm');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');
Route::get('/order/{id}', [CartController::class, 'show_oder'])->name('order.show');










