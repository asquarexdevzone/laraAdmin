<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Functionalities\ProductController;
use App\Http\Controllers\Functionalities\ColorController;
use App\Http\Controllers\Functionalities\SizeController;
use App\Http\Controllers\Functionalities\CategoryController;
use App\Http\Controllers\Functionalities\GalleryImageController;
use App\Http\Controllers\Functionalities\CatalogueController;
use App\Http\Controllers\Functionalities\BlogController;

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

Route::get('/', function () {return view('welcome');});

Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/product-master', [ProductController::class, 'addProductView'])->name('add.productview');
Route::post('/admin/add-product', [ProductController::class, 'addProduct'])->name('add.product');
Route::get('/admin/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
route::get('/admin/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
Route::put('/admin/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update.product');

Route::get('/admin/color-master', [ColorController::class, 'addColorView'])->name('add.colorview');
Route::post('/admin/add-color', [ColorController::class, 'addColor'])->name('add.color');
Route::get('/admin/delete-color/{id}', [ColorController::class, 'deleteColor'])->name('delete.color');
    
Route::get('/admin/sizes-master', [SizeController::class, 'addSizesView'])->name('add.sizesview');
Route::post('/admin/add-size', [SizeController::class, 'addSizes'])->name('add.size');
Route::get('/admin/delete-size/{id}', [SizeController::class, 'deleteSizes'])->name('delete.size');

Route::get('/admin/category-master', [CategoryController::class, 'addCategoryView'])->name('add.categoryview');
Route::post('/admin/add-category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::get('/admin/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

Route::get('/admin/gallery-images', [GalleryImageController::class, 'addGalleryImagesView'])->name('add.gallery-images-view');
Route::post('/admin/add-gallery-images', [GalleryImageController::class, 'addGalleryImages'])->name('add.gallery-images');
Route::get('/admin/delete-gallery-image/{id}', [GalleryImageController::class, 'deleteGalleryImage'])->name('delete.gallery-images');

Route::get('/admin/catalogue-master', [CatalogueController::class, 'addCatalogueView'])->name('add.catalogueview'); 
Route::post('/admin/add-catalogue', [CatalogueController::class, 'addCatalogue'])->name('add.catalogue');
Route::get('/admin/delete-catalogue/{id}', [CatalogueController::class, 'deleteCatalogue'])->name('delete.catalogue');

Route::get('/admin/blog-master', [BlogController::class, 'addBlogView'])->name('add.Blogview');
Route::post('/admin/add-blog', [BlogController::class, 'addBlog'])->name('add.blog');
Route::get('/admin/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete.blog');

    