<?php

namespace App\Http\Controllers;

use App\Models\FoodType;
use Illuminate\Http\Request;

class FoodTypeController extends Controller
{
    public function index(){
        $list = $this->list();
        $data_response = $this->listStorage();
        return view('FoodType.index',compact('list','data_response'));
    }
    public function insert(Request $request){
        try {
            // $request->validate([
            //     'food_type_name'    => 'required',
            //     'food_type_status'  => 'required'
            // ]);
            // FoodType::create([
            //     'food_type_name'    => $request->input('food_type_name'),
            //     'food_type_status'  => $request->input('food_type_status')
            // ]);

            foreach ($request->session()->get('data_tem') as $key => $value) {
                FoodType::create([
                    'food_type_name' => $value['food_type_name'],
                    'food_type_status' => $value['food_type_status']
                ]);
            }
            $request->session()->forget('data_tem');
            return redirect()->back()->with('InSuccess','Insert Successfully.');
        } catch (\Exception $err) {
            return redirect()->back()->with('InError', $err->getMessage());
        }

    }
    public function list(){
        $list = FoodType::query()->get();
        return $list->toArray();
    }
    public function delete($id){
        try {
            $destroy = FoodType::find($id);
            $destroy->delete();

            return redirect()->back()->with('InSuccess','Delete Successfully.');
        } catch (\Exception $err) {
            return redirect()->back()->with('InError', $err->getMessage());

        }

    }
    public function addLocalStorage(Request $request){
        $payload_data_tem = $request->validate([
            'food_type_name'    => 'required',
            'food_type_status'  => 'required'
        ]);
        $fileLocalStorage = $request->session()->get('data_tem',[]);
        $fileLocalStorage[] = $payload_data_tem;
        $request->session()->put('data_tem',$fileLocalStorage);
        return redirect()->back();
    }
    public function listStorage(){
        $fileLocalStorage = session('data_tem',[]);
        return $fileLocalStorage;
    }
    public function removeLocalStorage(Request $request, $id){
        $session = session('data_tem',[]);
        if(!empty($session)){
           unset($session[$id]);
        }
        $temporary = array_values($session);
        $request->session()->put('data_tem',$temporary);
        return redirect()->back();
    }
}
