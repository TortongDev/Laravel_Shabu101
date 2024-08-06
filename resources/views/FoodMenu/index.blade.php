@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('Layout.MasterPage')
@section('App')
    <div class="card mt-1">
        <div class="card-body">
            <h3>Foods Menu</h3>
            <h6>Master Data > Foods Menu</h6>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            ฟอร์มบันทึกข้อมูล
        </div>
        <div class="card-body">
            <div class="row">
               <form action="" method="post">
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
                            <label for="menu_food_price">ชื่อเมนู</label><br />
                            <input type="number" name="menu_food_price" id="menu_food_price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_status">สถานะใช้งาน</label><br />
                            <input type="radio" name="active" id="active" value="Y"/> <label for="active">Active</label>
                            <input type="radio" name="inactive" id="inactive" value="N" /> <label for="inactive">InActive</label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="picture">แนบรูปภาพ</label><br />
                            <input type="text" name="picture" id="picture" class="form-control">
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
                        <th>Lorem, ipsum.</th>
                        <th>Lorem, ipsum.</th>
                        <th>Lorem, ipsum.</th>
                        <th>Lorem, ipsum.</th>
                        <th>Lorem, ipsum.</th>
                        <th>Lorem, ipsum.</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                        </tr>
                    </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
