@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('Layout.MasterPage')
@section('App')
    <div class="card mt-1">
        <div class="card-body">
            <h3>Foods Menu</h3>
            <h6>Master Data > Foods Menu</h6>
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
            ฟอร์มบันทึกข้อมูล
        </div>
        <div class="card-body">
            <div class="row">
               <form action="{{route('master_data.insert.food_menu')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label for="menu_food_name">ชื่อเมนู</label><br />
                            <input type="text" name="menu_food_name" id="menu_food_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_desc">รายละเอียด</label><br />
                            <textarea cols="5" rows="10" name="menu_food_desc" id="menu_food_desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_price">ราคา / หน่วย</label><br />
                            <input type="number" name="menu_food_price" id="menu_food_price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_status">สถานะใช้งาน</label><br />
                            <input type="radio" name="menu_food_status" id="active" value="Y"/> <label for="active">Active</label>
                            <input type="radio" name="menu_food_status" id="inactive" value="N" /> <label for="inactive">InActive</label>
                        </div>
                        <div class="form-group mt-3">
                            <label for="menu_food_category">ประเภท</label><br />
                            <select name="menu_food_category" id="menu_food_category" class="form-control" readonly>
                                <option value=""> --เลือกข้อมูล-- </option>
                                @foreach($listType as $value)
                                    <option value="{{ $value['id'] }}">{{ $value['food_type_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="picture">แนบรูปภาพ</label><br />
                            <input type="file" name="picture" id="picture" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
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
                        <th>ชื่อเมนู</th>
                        <th>รายละเอียด</th>
                        <th>ราคา</th>
                        <th>สถานะการใช้งาน</th>
                        <th>ภาพประกอบ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @php($i=1)
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item['menu_food_name'] }}</td>
                                <td>{{ $item['menu_food_desc'] }}</td>
                                <td>{{ $item['menu_food_price'] }}</td>
                                <td>{{ $item['menu_food_status'] }}</td>
                                <td><img src="{{ asset('/storage/uploads/' . $item['picture']) }}" width="100px" height="100px" alt="picture+{{$item['id']}}"></td>
                                <td>
                                    <a href="{{route('mater_data.edit_food_menu',$item['id'])}}" class="btn btn-warning">แก้ไขข้อมูล</a>
                                    <a href="" class="btn btn-danger">ลบข้อมูล</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
