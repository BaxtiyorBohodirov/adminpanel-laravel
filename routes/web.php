<?php

use App\Http\Controllers\ProductsController;
use App\Models\Produts;
use Illuminate\Support\Facades\App;
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

Route::get('/admin',function(){
    return view('admin.home');
})->name('admin.home');

Route::get('/pdf',function(){
    $pdf = PDF::loadView('pdf',['item'=>'Hello']);
    return $pdf->stream();

    return view('pdf',['item'=>'Hello world!']);
});

Route::get('admin/products/search',[ProductsController::class,'search'])->name('products.search');
Route::get('admin/products/setSession',[ProductsController::class,'setSession'])->name('products.setSession');
Route::resource('admin/products',ProductsController::class)->only(['index','store','create','show','update','edit']);
Route::get('admin/products/destroy/{id}',[ProductsController::class, 'destroy'])->name('products.destroy');