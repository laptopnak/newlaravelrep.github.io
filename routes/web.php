<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

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

// Login Amin

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/index', [AdminController::class, 'admin_login']);

// Home Page
Route::get('/admin/home', [AdminController::class, 'home_page']);

// Category Page 
Route::get('/admin/category', [AdminController::class, 'category_page']);

Route::post('admin/add_category', [AdminController::class, 'add_category']);
Route::get('admin/category', [AdminController::class, 'show_category']);
Route::post('admin/delete_category/{cat_id}', [AdminController::class, 'delete_category']);

// Edit Category Routes
Route::get('admin/edit_category/{cat_id}', [AdminController::class, 'edit_category']);
Route::put('admin/update_category/', [AdminController::class, 'update_category']);

// Products
Route::get('admin/products', [AdminController::class, 'products']);

Route::post('admin/add_product', [AdminController::class, 'add_product']);


