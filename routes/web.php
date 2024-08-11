<?php

use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\FoodTypeController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('HomePage');
});


// food menu
Route::get('/master_data/form/food_menu',[FoodMenuController::class, 'index'])->name('mater_data.food_menu');
Route::post('/master_data/post/form_menu',[FoodMenuController::class, 'insert'])->name('master_data.insert.food_menu');
Route::get('/master_data/form/edit_food_menu/{id}',[FoodMenuController::class, 'edit'])->name('mater_data.edit_food_menu');
Route::put('/master_data/put/form_menu/{id}',[FoodMenuController::class, 'update'])->name('master_data.update.food_menu');

// food type
Route::get('/master_data/form/food_type',[FoodTypeController::class, 'index'])->name('mater_data.food_type');
Route::post('/master_data/post/food_type',[FoodTypeController::class, 'insert'])->name('master_data.insert.food_type');
Route::delete('/master_data/delete/food_type/{id}',[FoodTypeController::class, 'delete'])->name('master_data.delete.food_type');
Route::post('/master_data/addTemporary/food_type',[FoodTypeController::class, 'addLocalStorage'])->name('master_data.addTemporary.food_type');
Route::get('/master_data/removeLocalStorage/food_type/{id}',[FoodTypeController::class, 'removeLocalStorage'])->name('mater_data.removeLocalStorage');
