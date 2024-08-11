@extends('Layout.MasterPage')
@section('App')
<div class="card mt-2">
    <div class="card-header">
        ฟอร์มบันทึกข้อมูล
    </div>
    <div class="card-body">
        <div class="row">

            @foreach ($response as $item)
           <form action="{{route('master_data.update.food_menu',$item['id'])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label for="menu_food_name">ชื่อเมนู</label><br />
                            <input type="text" name="menu_food_name" id="menu_food_name" value="{{$item['menu_food_name']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_desc">รายละเอียด</label><br />
                            <textarea cols="5" rows="10" name="menu_food_desc" id="menu_food_desc" class="form-control">{{$item['menu_food_desc']}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_price">ราคา / หน่วย</label><br />
                            <input type="number" name="menu_food_price" id="menu_food_price" value="{{$item['menu_food_price']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_food_status">สถานะใช้งาน</label><br />
                            @if ($item['menu_food_status'] == 'Y')
                                <input type="radio" name="menu_food_status" id="active" value="Y" checked /> <label for="active">Active</label>
                                <input type="radio" name="menu_food_status" id="inactive" value="N" /> <label for="inactive">InActive</label>
                            @else
                                <input type="radio" name="menu_food_status" id="active" value="Y"/> <label for="active">Active</label>
                                <input type="radio" name="menu_food_status" id="inactive" value="N" checked /> <label for="inactive">InActive</label>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="picture">แนบรูปภาพ</label><br />
                            <input type="hidden" id="picture_path">
                            <input type="file" name="picture" id="picture" value="{{ $item['picture'] }}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            <button type="reset" class="btn btn-warning">ล้างฟอร์ม</button>
                        </div>
                    </div>
            </form>
            @endforeach
        </div>

    </div>
</div>
<script>
    let picture = document.querySelector('#picture')
    console.log(picture.files);

</script>
@endsection

