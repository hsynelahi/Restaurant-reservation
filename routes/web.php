<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('index.all');
Route::get('/redirects',[HomeController::class,'redirects'])->name('index.redirects');
Route::post('{food_id}/addcart/',[HomeController::class,'addcart'])->name('addcart.all'); 
Route::get('{id}/showcart/',[HomeController::class,'showcart'])->name('showcart.all');
Route::get('{cart_id}/deleteshowcart/',[HomeController::class,'deleteshowcart'])->name('deleteshowcart.all');
Route::post('orderconfirm/',[HomeController::class,'orderconfirm'])->name('orderconfirm.all');



Route::get('/users',[AdminController::class,'users'])->name('users.all');
Route::delete('{user_id}/deleteusers/',[AdminController::class,'deleteusers'])->name('deleteusers.all');
Route::get('/foodmenu',[AdminController::class,'foodmenu'])->name('foodmenu.all');
Route::post('/uploadFood',[AdminController::class,'uploadFood'])->name('uploadFood.all'); 
Route::delete('{food_id}/deleteFood',[AdminController::class,'deleteFood'])->name('deleteFood.all'); 
Route::get('{food_id}/updateView',[AdminController::class,'updateView'])->name('updateView.all'); 
Route::put('{food_id}/updatefood',[AdminController::class,'updatefood'])->name('updatefood.admin');

Route::get('/reservation',[AdminController::class,'reservation'])->name('reservation.all'); 
Route::get('/addreservation',[AdminController::class,'addreservation'])->name('addreservation.all'); 

Route::get('/chefview',[AdminController::class,'chefview'])->name('chefview.all'); 
Route::post('/addchef',[AdminController::class,'addchef'])->name('addchef.all'); 
Route::delete('{chef_id}/deleteChef',[AdminController::class,'deleteChef'])->name('deleteChef.all'); 
Route::get('{chef_id}/updateChefView',[AdminController::class,'updateChefView'])->name('updateChefView.all'); 
Route::put('{chef_id}/updatechef',[AdminController::class,'updatechef'])->name('updatechef.admin');

Route::get('/search',[AdminController::class,'search'])->name('search.admin');

Route::get('/orderview',[AdminController::class,'orderview'])->name('orderview.admin');










    





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
