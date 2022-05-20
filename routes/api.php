<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\RecipeController
;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1/'], function () {
    Route::group(['prefix' => 'common'], function () {
        Route::get('/homepage', [CommonController::class,'homepage']);
        Route::get('/categories/parents', [CommonController::class,'parents'])->name('categories.parents');
        Route::get('/recipes/kitchens', [CommonController::class,'kitchens'])->name('recipes.kitchens');
        Route::get('/recipes/categories', [CommonController::class,'categories'])->name('recipes.categories');
        Route::get('/recipes/occasions', [CommonController::class,'occasions'])->name('recipes.occasions');
    });
   
    Route::group(['prefix' => 'recipes'], function () {
        Route::get('/', [RecipeController::class,'recipes'])->name('categories.parents');
    });

});