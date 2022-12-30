@extends('admin.back.master')
@section('content')
{{-- <h5 style="font-weight: bold">Thêm Danh Mục Sản Phẩm</h5> --}}
<div class="container mt-0">
    <div class="row">
        <div class="col-sm-10">
            {{-- error --}}
            <form action="{{ route('adminuser.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                   <label for="" style="font-weight: bold">Tên : </label>
                   <input type="text" name="ten" id="tendm" class="form-control mt-1">
                   <p class="text-danger">{{$errors->first('ten')}}</p>
                </div>
                
                <div class="form-group mb-3">
                    <label for="" style="font-weight: bold">Email tài khoản : </label>
                    <input type="text" name="email" id="email" class="form-control mt-1">
                    <p class="text-danger">{{$errors->first('email')}}</p>
                 </div>
                 <div class="form-group mb-3">
                    <label for="" style="font-weight: bold">Vai trò : </label>
                    <select name="typeuser" id="" style="width: 150px">
                        <option value="1">Admin</option>
                        <option value="2" selected >Người dùng</option>
                    </select>
                 </div>
                 <div class="form-group mb-3">
                    <label for="" style="font-weight: bold">Mật khẩu : </label>
                    <input type="password" name="password" id="password" class="form-control mt-1">
                    <p class="text-danger">{{$errors->first('password')}}</p>
                 </div>
                 <div class="form-group mb-3">
                    <label for="" style="font-weight: bold">Xác nhận mật khẩu : </label>
                    <input type="password" name="xacnhanpass" id="password" class="form-control mt-1">
                    <p class="text-danger">{{$errors->first('xacnhanpass')}}</p>
                 </div>
                 <div class="form-group mt-1">
                   <input class="btn btn-info btn-sm" type="submit" value="Thêm tài khoản">
                 </div>
            </form>
        </div>
    </div>
</div>
@endsection