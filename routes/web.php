<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\EdithomeController;
use App\Http\Controllers\Admin\EditmenuController;
use App\Http\Controllers\Admin\EditaboutController;
use App\Http\Controllers\Admin\EditcontactController;


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


// user side 
Route::localized(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/menu/{id?}/item', [MenuController::class, 'item'])->name('menu.item');
    Route::get('/menu/category/{id?}', [MenuController::class, 'category'])->name('menu.category');
     Route::get('/menu/tags/{id?}', [MenuController::class, 'tags'])->name('menu.tags');
    Route::get('/news', [HomeController::class, 'news'])->name('home.news');
    
});

// admin side
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

// adminpannel
Route::get('/adminPannel',[AdminController::class, 'index'])->name('adminPannel');

// categories
Route::get('/adminPannel/categories',[EditmenuController::class, 'index'])->name('categories');
Route::post('/adminPannel/categories/store',[EditmenuController::class, 'store'])->name('categories.store');
Route::post('/adminPannel/categories/{id}/delete',[EditmenuController::class, 'delete'])->name('categories.delete');
Route::get('/adminPannel/categories/status/update',[EditmenuController::class, 'updateStatus'])->name('categories.update.status');
// home
Route::get('/adminPannel/edithome',[EdithomeController::class, 'index'])->name('edithome');
Route::post('/adminPannel/edithome',[EdithomeController::class, 'store'])->name('edithome.store');

// about
Route::get('/adminPannel/editabout',[EditaboutController::class, 'index'])->name('editabout');
Route::post('/adminPannel/editabout',[EditaboutController::class, 'store'])->name('editabout.store');

// contact
Route::get('/adminPannel/editcontact',[EditcontactController::class, 'index'])->name('editcontact');
Route::post('/adminPannel/editcontact',[EditcontactController::class, 'store'])->name('editcontact.store');

// poduct

Route::get('/adminPannel/products',[ProductController::class, 'index'])->name('products');
Route::get('/adminPannel/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/adminPannel/products/create',[ProductController::class, 'store'])->name('products.store');
Route::get('/adminPannel/products/{id}/delete',[ProductController::class, 'delete'])->name('products.delete');
Route::get('/adminPannel/products/{id}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::post('/adminPannel/products/{id}/edit',[ProductController::class, 'update'])->name('products.update');
Route::get('/adminPannel/products/status/update',[ProductController::class, 'updateStatus'])->name('products.update.status');

Route::get('/adminPannel/products/flavors',[ProductController::class, 'flavors'])->name('products.flavors');
Route::post('/adminPannel/products/flavors',[ProductController::class, 'storeflavor'])->name('products.flavor.store');
Route::get('/adminPannel/products/flavors/{id}/delete',[ProductController::class, 'deleteflavor'])->name('products.flavor.delete');

Route::get('/adminPannel/products/tags',[ProductController::class, 'tags'])->name('products.tags');
Route::post('/adminPannel/products/tags',[ProductController::class, 'storetag'])->name('products.tag.store');
Route::get('/adminPannel/products/tags/{id}/delete',[ProductController::class, 'deletetag'])->name('products.tag.delete');

Route::get('/adminPannel/products/types',[ProductController::class, 'types'])->name('products.types');
Route::post('/adminPannel/products/types',[ProductController::class, 'storetypes'])->name('products.types.store');
Route::get('/adminPannel/products/types/{id}/delete',[ProductController::class, 'deletetypes'])->name('products.types.delete');


// news

Route::get('/adminPannel/news',[NewsController::class, 'index'])->name('news');
Route::get('/adminPannel/news/create',[NewsController::class, 'create'])->name('news.create');
Route::post('/adminPannel/news/create',[NewsController::class, 'store'])->name('news.store');
Route::get('/adminPannel/news/{id}/delete',[NewsController::class, 'delete'])->name('news.delete');
Route::get('/adminPannel/news/{id}/edit',[NewsController::class, 'edit'])->name('news.edit');
Route::post('/adminPannel/news/{id}/edit',[NewsController::class, 'update'])->name('news.update');

//sliders

Route::get('/adminPannel/sliders',[SlidersController::class, 'index'])->name('sliders');
Route::get('/adminPannel/sliders/create',[SlidersController::class, 'create'])->name('sliders.create');
Route::post('/adminPannel/sliders/create',[SlidersController::class, 'store'])->name('sliders.store');
Route::get('/adminPannel/sliders/{id}/delete',[SlidersController::class, 'delete'])->name('sliders.delete');

