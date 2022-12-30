 @extends('front.master')
<!-- Google Web Fonts -->

<title>{{ $title }}</title>
@section('content')
    <div class="container"  style="margin-top: 50px; margin-bottom: 50px">
        <div class="row">
            <center><p style="color: #c43b68; font-size: 2em">Thông tin Khách Hàng</p></center>
        </div>
        @include('error.error')
        <div class="row mt-5">
            <div class="col-md-3 ">
                <ul class="list-group bg-info">
                    <li class="list-group-item"><a href="{{route('infor',['id' => Auth::user()->id ])}}">Thông tin chung</a></li>
                    <li class="list-group-item"><a href="{{route('inforOrder',['id'=> Auth::user()->id])}}">Các đơn hàng</a></li>
                    <li class="list-group-item"><a href="{{route('detailLike',['id'=>Auth::user()->id])}}">Danh sách yêu thích</a></li>
                </ul>
                <br>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn" style="color: #c43b68; border: 1px solid #c43b68; background: transparent; border-radius: 0">Đăng Xuất</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                     
                        <form action="{{route('update',['id' => Auth::user()->id])}}" method="post">
                
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text"  name="name" class="form-control" value="{{$result[0]->name}}">
                                @error('user_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"  class="form-control" readonly  value="{{$result[0]->email}}">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" name="password_old" class="form-control">
                                @error('user_password_old')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control">
                                @error('user_password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu mới</label>
                                <input type="password" name="password_again" class="form-control">
                                @error('user_password_again')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <button class="btn btn-outline-secondary" type="submit">Đổi thông tin</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


