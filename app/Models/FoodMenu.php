<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    use HasFactory;


    // $table->string('menu_food_name',50);
    // $table->string('menu_food_desc',300);
    // $table->double('menu_food_price')->default(0);
    // $table->string('picture',300);
    // $table->char('menu_food_status',1);

    protected $fillable = ['menu_food_name','menu_food_desc','menu_food_price','picture','menu_food_status'];
}
