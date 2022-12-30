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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ngày đặt</th>
                                    <th>Tống giá</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{date_format(date_create($order->created_at),'d/m/yy')}}</td>
                                        <td>{{number_format($order->doanhthu).' VNĐ'}}</td>
                                        @switch($order->trangthai)
                                            @case(1)
                                                <td>Chờ xác nhận đơn hàng</td>
                                                @break
                                            @case(2)
                                                <td>Đã xác nhận đơn hàng và chờ đơn vị vận chuyển đến lấy hàng</td>
                                                @break
                                        @endswitch
                                        <td><a class="btn btn-outline-secondary" href="{{route('detailOrder',['id'=>$order->id])}}">Xem chi tiết</a></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


