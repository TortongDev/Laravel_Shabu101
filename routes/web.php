<?php

use App\Http\Controllers\FoodMenuController;
use Illuminate\Support\Facades\Route;

Route::get('/master_data/food_menu', function () {
    return view('FoodMenu.index');
});
Route::get('/',function(){
    return view('HomePage');
});


// food menu
Route::get('/master_data/form/food_menu',[FoodMenuController::class, 'index'])->name('mater_data.food_menu');
Route::post('/master_data/post/form_menu',[FoodMenuController::class, 'insert'])->name('master_data.insert.food_menu');
Route::get('/master_data/form/edit_food_menu/{id}',[FoodMenuController::class, 'edit'])->name('mater_data.edit_food_menu');
