<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');
Route::get('/adminPannel',[AdminController::class, 'index'])->name('adminPannel');

Route::get('/adminPannel/editmenu',[EditmenuController::class, 'index'])->name('editmenu');
Route::post('/adminPannel/editmenu',[EditmenuController::class, 'storeProduct']);
Route::get('/adminPannel/edithome',[EdithomeController::class, 'index'])->name('edithome');
Route::get('/adminPannel/editabout',[EditaboutController::class, 'index'])->name('editabout');
Route::get('/adminPannel/editcontact',[EditcontactController::class, 'index'])->name('editcontact');
