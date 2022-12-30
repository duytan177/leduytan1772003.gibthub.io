@extends('admin.back.master')
@section('content')
{{-- <h5 style="font-weight: bold">Sửa Danh Mục Sản Phẩm</h5> --}}
<div class="container"> 
    <div class="row">
        <div class="col-sm-10">
                {{-- error --}}
                @include('error.error')
                <form action="{{ route('adminorder.update',$orders[0]->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Tên Người đặt hàng:</label>
                    <input type="text" name="ten" id="ten" class="form-control mt-2" value= "{{$orders[0]->ten}}"> 
                  </div>
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Địa chỉ: </label>
                    <input type="text" name="diachi" id="diachi" class="form-control mt-2" value="{{ $orders[0]->diachi}}">
                  </div>        
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Số điện thoại: </label>
                    <input type="text" name="sodienthoai" id="" class="form-control mt-2" value="{{ $orders[0]->sodienthoai }}">
                  </div>
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Lợi nhuận: </label>
                    <input type="text" name="loinhuan" id="loinhuan" class="form-control mt-2" value="{{$orders[0]->loinhuan }}">
                  </div>
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Doanhthu : </label>
                    <input type="text" name="doanhthu" id="" class="form-control mt-2" value="{{ $orders[0]->doanhthu }}">
                  </div>
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Trạng thái: </label>
                    <select name="trangthai" id="" class="">
                        <option value="1" {{$orders[0]->trangthai==1?'selected':'false'}}>Chờ</option>
                        <option value="2" {{$orders[0]->trangthai==2?'selected':'false'}}>Đã xác nhận</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="categoryname" style="font-weight: bold">Chú thích: </label>
                   <textarea name="" id="" class="form-control summernote" cols="30" rows="10"></textarea>
                  </div> 
                  <div class="form-group mt-2">
                    <input class="btn btn-info btn-sm" type="submit" value="Lưu">
                  </div>
                </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //Thiết lập Editor Summernote
        $('.summernote').summernote({
            height: 240,                 
            minHeight: null,             
            maxHeight: null,             
            focus: false                 
        }); 
    });
    //CKEDITOR.replace('mota');
</script>
@endsection