<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\FoodType;
use Exception;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    public function index(){
        $list = $this->list();
        $listType = $this->listType();
        // redirect()->route('mater_data.food_menu',compact('food_list_item'))
        return view('FoodMenu.index',['list'=>$list,'listType' =>  $listType]);
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
    public function list(){
        $food_list = FoodMenu::query()->orderBy('id','desc')->get();
        return $food_list->toArray();
    }
    public function listType(){
        $listType = FoodType::query();
        return $listType->get()->toArray();
    }
    public function update(Request $request,$id){
        try {
            $update = FoodMenu::find($id);
            if($request->hasFile('picture')){
                $request->validate([
                    'menu_food_name' => 'required',
                    'menu_food_desc' => 'required',
                    'menu_food_price' => 'required',
                    'picture'        => 'required',
                    'menu_food_status' => 'required'
                ]);
                $filename = $request->file('picture');
                $imageNameCreate = time().'_'.$filename->getClientOriginalName();
                $filename->storeAs('uploads',$imageNameCreate,'public');
                $update->update([
                    'menu_food_name' => $request->input('menu_food_name'),
                    'menu_food_desc' => $request->input('menu_food_desc'),
                    'menu_food_price' => $request->input('menu_food_price'),
                    'picture'        => $imageNameCreate,
                    'menu_food_status' => $request->input('menu_food_status')
                ]);
            }else{
                $request->validate([
                    'menu_food_name' => 'required',
                    'menu_food_desc' => 'required',
                    'menu_food_price' => 'required',
                    'menu_food_status' => 'required'
                ]);

                $update->update([
                    'menu_food_name' => $request->input('menu_food_name'),
                    'menu_food_desc' => $request->input('menu_food_desc'),
                    'menu_food_price' => $request->input('menu_food_price'),
                    'menu_food_status' => $request->input('menu_food_status')
                ]);
            }
            return redirect()->route('mater_data.food_menu')->with('InSuccess','update Successfully.');
        } catch (Exception $err) {

            return redirect()->route('mater_data.food_menu')->with('InError',$err->getMessage());

        }
    }
}
