<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => '/product'
] , function(){

   Route::get('/' , [ProductController::class , 'all']);
   Route::get('/add' , [ProductController::class , 'add']);
   Route::post('/add' , [ProductController::class , 'store']);
   Route::delete('/delete/{id}' , [ProductController::class , 'delete']);

});
