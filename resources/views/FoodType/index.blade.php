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
            ข้อมูลชั่วคราว
        </div>
        <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tem_name</th>
                            <th>Tem_status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $j = 1;
                        @endphp
                        @foreach (session('data_tem',[]) as $i => $temporaty)
                            <tr>
                                <td>{{$j++}}</td>
                                <td>{{$temporaty['food_type_name']}}</td>
                                <td>{{$temporaty['food_type_status']}}</td>
                                <td>
                                    <a href="{{route('mater_data.removeLocalStorage',$i)}}"><button type="submit" class="btn btn-danger">ลบข้อมูลชั่วคราว</button></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <form method="post" action="{{route('master_data.insert.food_type')}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">บันทึกลงฐานข้อมูล</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            ฟอร์มบันทึกข้อมูล
        </div>
        <div class="card-body">
            <div class="row">
               <form action="{{route('master_data.addTemporary.food_type')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label for="foodt_type_name">ชื่อประเภท</label><br />
                            <input type="text" name="food_type_name" id="menu_food_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="food_type_status">ชื่อประเภท</label><br />
                            <input type="radio" name="food_type_status" id="Active" value="Y" /> <label for="Active">Active</label>
                            <input type="radio" name="food_type_status" id="Inactive" value="N" /> <label for="Inactive">Inactive</label>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูลชั่วคราว</button>
                            <button type="reset" class="btn btn-warning">ล้างฟอร์ม</button>
                        </div>
                    </div>
               </form>
            </div>

        </div>
    </div>
    {{-- List Data --}}

    <div class="card mt-2">
        <div class="card-header">
            ข้อมูลที่บันทึก
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อประเภท</th>
                        <th>สถานะการใช้งาน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 1)
                    @endphp
                    @foreach ($list as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item['food_type_name']}}</td>
                            <td>{{$item['food_type_status']}}</td>
                            <td>
                                <a href="" class="btn btn-warning">แก้ไขข้อมูล</a>
                                <form action="{{route('master_data.delete.food_type',$item['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('You are Sure Yes for Delete and No for not Delete.')" class="btn btn-danger">ลบข้อมูล</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
