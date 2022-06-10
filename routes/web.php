<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\PageController;


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
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('do_login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'common'], function () {
    Route::get('/categories/parents', [CategoryController::class,'parents'])->name('categories.parents');
    Route::get('/recipes/kitchens', [RecipeController::class,'kitchens'])->name('recipes.kitchens');
    Route::get('/recipes/categories', [RecipeController::class,'categories'])->name('recipes.categories');
    Route::get('/recipes/occasions', [RecipeController::class,'occasions'])->name('recipes.occasions');

});

//Category
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/load', [CategoryController::class,'load'])->name('categories.load');
Route::post('/categories/delete', [CategoryController::class,'destroy'])->name('categories.destroy');
Route::post('/categories/disable', [CategoryController::class,'disable'])->name('categories.disable');
Route::post('/categories/activate', [CategoryController::class,'activate'])->name('categories.activate');
Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/update', [CategoryController::class,'update'])->name('categories.update');

//Recipes
Route::get('/recipes', [RecipeController::class,'index'])->name('recipes.index');
Route::get('/recipes/load', [RecipeController::class,'load'])->name('recipes.load');
Route::post('/recipes/delete', [RecipeController::class,'destroy'])->name('recipes.destroy');
Route::post('/recipes/disable', [RecipeController::class,'disable'])->name('recipes.disable');
Route::post('/recipes/activate', [RecipeController::class,'activate'])->name('recipes.activate');
Route::get('/recipes/create', [RecipeController::class,'create'])->name('recipes.create');
Route::post('/recipes/store', [RecipeController::class,'store'])->name('recipes.store');
Route::get('/recipes/edit/{recipe}', [RecipeController::class,'edit'])->name('recipes.edit');
Route::post('/recipes/update', [RecipeController::class,'update'])->name('recipes.update');
Route::get('/recipes/{recipe}', [RecipeController::class,'show'])->name('recipes.show');

Route::get('/privacy-policy', [PageController::class,'privacyPolicy'])->name('privacy-policy');


