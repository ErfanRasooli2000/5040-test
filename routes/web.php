<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin_error' , function (){
    return view('auth.admin');
})->name('auth.admin');


// admin Routes
Route::group([
    'prefix' => '/product',
    'middleware' => 'admin' ,
] , function(){

    Route::get('/' , [ProductController::class , 'all'])->name('admin.product.all');
    Route::get('/add' , [ProductController::class , 'add'])->name('admin.product.add');
    Route::post('/add' , [ProductController::class , 'store'])->name('admin.product.store');
    Route::delete('/delete/{id}' , [ProductController::class , 'delete'])->name('admin.product.delete');
});


//user routes
Route::middleware('auth')->group(function(){

    Route::get('/products' , [ProductController::class , 'products'])->name('user.products');
    Route::get('/product/add/{id}' , [CartController::class , 'add_to_cart'])->name('add_to_cart');
    Route::get('/product/remove/{id}' , [CartController::class , 'remove_from_cart'])->name('remove_from_cart');
    Route::get('/product/delete/{id}' , [CartController::class , 'delete_from_cart'])->name('delete_from_cart');
    Route::get('/cart' , [CartController::class , 'cart'])->name('user.cart');
    Route::get('/buy' , [CartController::class , 'buy'])->name('buy');
});
