@extends('admin')      
@section('content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật sản phẩm
        </header>
        <div class="panel-body">

            {{-- thông báo sau khi thêm danh mục thành công --}}
            <?php
                $message = Session::get('message');
                if($message)
                {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>

            <div class="position-center">
                @foreach($edit_product as $key => $pro)
                <form role="form" action = "{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">{{-- phải có cái này mới gửi ảnh qua đc --}}{{-- form gửi đi sẽ đến đường dẫn save-category-product --}}
                    {{csrf_field() }}  {{-- để bảo mật  thông tin --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="double" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                    <img src="{{URL::to('uploads/product/'.$pro->product_image)}}" height="100" width="100">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Màu sắc</label>
                    <input type="text" name="product_color" class="form-control" id="exampleInputEmail1" value="{{$pro->product_color}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Size</label>
                    <input type="text" name="product_size" class="form-control" id="exampleInputEmail1" value="{{$pro->product_size}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea style = "resize: none" rows = "5" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$pro->product_desc}}</textarea>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                    <textarea style = "resize: none" rows = "5" class="form-control" name="product_content" id="exampleInputPassword1" >{{$pro->product_content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lựa chọn danh mục sản phẩm</label>
                     <select name="product_cate" class="form-control input-sm m-bot15">

                        @foreach($cate_product as $key => $cate)
                        @if($cate->id == $pro->category_id)
                            <option selected value="{{$cate->id}}">{{$cate->category_name}}</option>
                        @else
                            <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                        @endif
                        @endforeach
                    
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lựa chọn hiển thị</label>
                     <select name="product_status" class="form-control input-sm m-bot15">
                        
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <button type="submit" name="edit_product" class="btn btn-info">Cập nhật sản phẩm</button>
            </form>
            @endforeach
            </div>

        </div>
    </section>

</div>
@endsection