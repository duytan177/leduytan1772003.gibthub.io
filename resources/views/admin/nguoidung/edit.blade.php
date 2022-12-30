@extends('admin.back.master')
@section('content')
{{-- <h5 style="font-weight: bold">Sửa Danh Mục Sản Phẩm</h5> --}}
<div class="container">
    <div class="row">
        <div class="col-sm-10">
                {{-- error --}}
                @include('error.error')
                <form action="{{ route('adminuser.update',$user[0]->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="name" style="font-weight: bold">Tên Người dùng:</label>
                    <input type="text" name="name" id="" class="form-control mt-2" value="{{ $user[0]->name }}">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                  </div>
                  <div class="form-group">
                    <label for="" style="font-weight: bold">Email người dùng:</label>
                    <input type="text" name="email" id="" class="form-control mt-2" value="{{ $user[0]->email }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="" style="font-weight: bold">Vai trò : </label>
                    <select name="typeuser" id="" style="width: 150px">
                        <option value="1" {{$user[0]->typeuser == 1?'selected':'false'}}>Admin</option>
                        <option value="2" {{$user[0]->typeuser == 2?'selected':'false'}}>User</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="" style="font-weight: bold">Password:</label>
                    <input type="password" name="password" id="" class="form-control mt-2" value={{ $user[0]->password }}>
                    <p class="text-danger">{{$errors->first('password')}}</p>
                  </div>
                  <div class="form-group">
                    <label for="" style="font-weight: bold">Xác nhận Password:</label>
                    <input type="password" name="xacnhanpass" id="" class="form-control mt-2" value={{ $user[0]->password }}>
                    <p class="text-danger">{{$errors->first('xacnhanpassword')}}</p>
                  </div>
                  <div class="form-group mt-2">
                    <input class="btn btn-info btn-sm" type="submit" value="Lưu thông tin">
                  </div>
                </form>
        </div>
    </div>
</div>
@endsection