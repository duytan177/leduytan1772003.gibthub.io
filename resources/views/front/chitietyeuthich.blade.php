@extends('front.master')
<!-- Google Web Fonts -->

<title>{{ $title }}</title>
@section('content')
    <div class="container"  style="margin-top: 50px; margin-bottom: 50px">
        <div class="row">
            <center><p style="color: #c43b68; font-size: 2em">{{$title}}</p></center>
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
                        <div class="container text-center" style="margin-left: 20px">
                            <div class=" shopping">
                              @foreach ($yeuthichs as $yeuthich)
                                <div class=" shopping-list">
                                    <a href="{{route('deleteLike',['id'=>$yeuthich->idsp])}}" class="btn btn-outline-warning"><i class="bx bx-x"></i></a>
                                    <br>
                                    <a href="{{route('chitietsanpham',['id'=>$yeuthich->idsp])}}" class="shopping-list-item">
                                        <img src="{{asset($yeuthich->anh)}}"  style="margin:0;;height: 80%; width: 80%" alt="Ảnh sản phẩm">
                                    </a>
                                    <br>
                                    {!!$yeuthich->mota!!}
                                    <p>
                                        {{number_format($yeuthich->gia).'VNĐ'}}  <span style="text-decoration: line-through" > {{number_format($yeuthich->gia*120/100).'VNĐ'}} </span>
                                    </p>
                                </div>
                
                              @endforeach
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


