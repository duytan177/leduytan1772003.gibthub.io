@extends('admin.back.master')

@section('content')
    <div class="container mt-0">
        <div class="row">
            @include('error.error')
            <div class="col-md-8">
                <form action="{{ route('adminpro.index') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="iddm" style="font-weight: bold">Chọn danh mục:</label>
                        <select name="iddm" id="category    ID" class="form-control">
                            @foreach ($dmsps as $dmsp)
                                <option value="{{ $dmsp->iddm }}">
                                    {{ $dmsp->tendm }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="masp" style="font-weight: bold">Mã Sản Phẩm:</label>
                        <input type="text" name="masp" id="masp" class="form-control">
                        <p class="text-danger">{{$errors->first('masp')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="tensp" style="font-weight: bold">Tên Sản Phẩm:</label>
                        <input type="text" name="tensp" id="tensp" class="form-control">
                        <p class="text-danger">{{$errors->first('tensp')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="anh" style="font-weight: bold">Chọn Ảnh Upload:</label>
                        <input type="file" name="anh" id="anh" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="color" style="font-weight: bold">màu sắc:</label>
                        <input type="text" name="color" id="" class="form-control">
                        <p class="text-danger">{{$errors->first('color')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="size" style="font-weight: bold">size :</label>
                        <input type="text" name="size" id="" class="form-control">
                        <p class="text-danger">{{$errors->first('size')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="soluong" style="font-weight: bold">số lượng :</label>
                        <input type="number" name="soluong" id="" min="1" class="form-control">
                        <p class="text-danger">{{$errors->first('soluong')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="gia" style="font-weight: bold">Giá:</label>
                        <input type="text" name="gia" id="gia" class="form-control">
                        <p class="text-danger">{{$errors->first('gia')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="mota" style="font-weight: bold">Mô Tả Sản Phẩm:</label>
                        <textarea type="text" name="mota" class="form-control summernote"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info btn-sm" type="submit"  value="Thêm Sản Phẩm">
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
