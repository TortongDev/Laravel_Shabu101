@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('Layout.MasterPage')
@section('App')
    <div class="card mt-1">
        <div class="card-body">
            <h3>Foods Category</h3>
            <h6>Master Data > Foods Category</h6>
        </div>
    </div>
    @if (!empty(session('InSuccess')))
        <div class="alert alert-success" id="setTime">
            <strong>Success!</strong> {{ session('InSuccess') }}
        </div>
    @endif
    @if (!empty(session('InError')))
        <div class="alert alert-warning" id="setTime">
            <strong>Error!</strong> {{ session('InError') }}
        </div>
    @endif




    <div class="card mt-2">
        <div class="card-header">
            ฟอร์มแก้ไขข้อมูล
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($fetchArr as $key => $item)
               <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label for="foodt_type_name">ชื่อประเภท</label><br />
                            <input type="text" name="food_type_name" id="food_type_name" value="{{$item['food_type_name']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="food_type_status">ชื่อประเภท</label><br />
                            @if ($item['food_type_status'] == 'Y')
                                <input type="radio" name="food_type_status" id="Active" value="Y" checked /> <label for="Active">Active</label>
                                <input type="radio" name="food_type_status" id="Inactive" value="N" /> <label for="Inactive">Inactive</label>
                            @else
                                <input type="radio" name="food_type_status" id="Active" value="Y" /> <label for="Active">Active</label>
                                <input type="radio" name="food_type_status" id="Inactive" value="N" checked /> <label for="Inactive">Inactive</label>
                            @endif

                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูลชั่วคราว</button>
                            <button type="reset" class="btn btn-warning">ล้างฟอร์ม</button>
                        </div>
                    </div>
               </form>
               @endforeach

            </div>

        </div>
    </div>

@endsection
