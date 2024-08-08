<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Exception;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    public function index(){
        return view('FoodMenu.index');
    }
    public function insert(Request $request){
        try {
            $request->validate([
                'menu_food_name' => 'required',
                'menu_food_desc' => 'required',
                'menu_food_price' => 'required',
                'picture'        => 'required',
                'menu_food_status' => 'required'
            ]);
            if($request->hasFile('picture')){
                $filename = $request->file('picture');
                $imageNameCreate = time().'_'.$filename->getClientOriginalName();
                $filename->storeAs('uploads',$imageNameCreate,'public');
            FoodMenu::create([
                'menu_food_name' => $request->input('menu_food_name'),
                'menu_food_desc' => $request->input('menu_food_desc'),
                'menu_food_price' => $request->input('menu_food_price'),
                'picture'        => $imageNameCreate,
                'menu_food_status' => $request->input('menu_food_status')
            ]);
        }
            return redirect()->back()->with('InSuccess','Insert Successfully.');
        } catch (Exception $err) {
            return redirect()->back()->with('InError',$err->getMessage());
        }
    }
    public function edit(Request $request, $id){
        $find = FoodMenu::query();
        $find = $find->where('id',$id)->get();
        return view('FoodMenu.Edit',['response'=>$find->toArray(0)]);


    }
}
