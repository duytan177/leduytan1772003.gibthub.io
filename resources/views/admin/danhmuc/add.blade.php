@extends('admin.back.master')
@section('content')
{{-- <h5 style="font-weight: bold">Thêm Danh Mục Sản Phẩm</h5> --}}
<div class="container mt-0">
    <div class="row">
        <div class="col-sm-10">
            {{-- error --}}
            @include('error.error')
            <form action="{{ route('admincat.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                   <label for="categoryname" style="font-weight: bold">Tên Danh Mục:</label>
                   <input type="text" name="tendm" id="tendm" class="form-control mt-1">
                </div>
                <div class="form-group mt-1">
                  <input class="btn btn-info btn-sm" type="submit" value="Thêm Danh Mục">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection