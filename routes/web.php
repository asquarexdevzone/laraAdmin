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

Route::get('/admin/color-master', [ColorController::class, 'addColorView'])->name('add.colorview');
Route::post('/admin/add-color', [ColorController::class, 'addColor'])->name('add.color');
    
Route::get('/admin/sizes-master', [SizeController::class, 'addSizesView'])->name('add.sizesview');
Route::post('/admin/add-size', [SizeController::class, 'addSizes'])->name('add.size');

Route::get('/admin/category-master', [CategoryController::class, 'addCategoryView'])->name('add.categoryview');
Route::post('/admin/add-category', [CategoryController::class, 'addCategory'])->name('add.category');

Route::get('/admin/gallery-images', [GalleryImageController::class, 'addGalleryImagesView'])->name('add.gallery-images-view');
Route::post('/admin/add-gallery-images', [GalleryImageController::class, 'addGalleryImages'])->name('add.gallery-images');

Route::get('/admin/catalogue-master', [CatalogueController::class, 'addCatalogueView'])->name('add.catalogueview'); 
Route::post('/admin/add-catalogue', [CatalogueController::class, 'addCatalogue'])->name('add.catalogue');

Route::get('/admin/blog-master', [BlogController::class, 'addBlogView'])->name('add.Blogview');
Route::post('/admin/add-blog', [BlogController::class, 'addBlog'])->name('add.blog');

    