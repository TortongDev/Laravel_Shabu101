<?php

use Illuminate\Support\Facades\Route;

Route::get('/master_data/food_menu', function () {
    return view('FoodMenu.index');
});
Route::get('/',function(){
    return view('view');
});
