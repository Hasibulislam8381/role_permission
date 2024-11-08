<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ViewProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ViewProductController::class, 'index']);
Route::get('/products/filter/{subcategorySlug}', [ViewProductController::class, 'filterBySubcategory'])->name('products.filter');
Route::get('/product-details/{slug}', [ViewProductController::class, 'product_details'])->name('product_details');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(
    function () {
        Route::get('/admin',  [BackendController::class, 'admin'])->name('admin');
        Route::get('/logout', [BackendController::class, 'authLogout'])->name('authLogout');


        Route::controller(CategoryController::class)->prefix('/admin/category')->name('backend.category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::put('/update/{category}', 'update')->name('update');
            Route::delete('/destroy/{category}', 'destroy')->name('delete');
           
        });
        Route::controller(SubcategoryController::class)->prefix('/admin/subcategory')->name('backend.subcategory.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{subcategory}', 'edit')->name('edit');
            Route::put('/update/{subcategory}', 'update')->name('update');
            Route::delete('/destroy/{subcategory}', 'destroy')->name('delete');          
        });
        Route::controller(ProductController::class)->prefix('/admin/product')->name('backend.product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{product}', 'edit')->name('edit');
            Route::put('/update/{product}', 'update')->name('update');
            Route::delete('/{product}', 'destroy')->name('delete');
        });
        Route::controller(RoleController::class)->prefix('/admin/roles')->name('backend.roles.')->group(function () {
            Route::get('/', 'index')->name('index');  // List roles
            Route::get('/create', 'create')->name('create');  // Show create form
            Route::post('/store', 'store')->name('store');  // Store new role
            Route::get('/edit/{role}', 'edit')->name('edit');  // Show edit form
            Route::put('/update/{role}', 'update')->name('update');  // Update role
            Route::delete('/destroy/{role}', 'destroy')->name('delete');  // Delete role
            Route::get('/{role}/permissions', 'editPermissions')->name('permissions');  // Manage role permissions
            Route::post('/{role}/permissions', 'updatePermissions')->name('updatePermissions');  // Update permissions for a role
        });

    });
