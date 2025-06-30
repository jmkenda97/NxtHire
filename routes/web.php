<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

//all listing
Route::get('/', [ListingController::class, 'index']);


//show create form 
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');

//store;isting data
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//delete listing
Route::delete('/listing/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//update listing 
Route::put('/listing/{listing}' , [ListingController::class, 'update'])->middleware('auth');

//manage Listing
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);




//sHOW register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create user
Route::post('/users',[UserController::class, 'store']);

//log user out.logout
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');


//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user route
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Manage Listings

