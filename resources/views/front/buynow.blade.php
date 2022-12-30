@extends('front.master')
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<title>{{ $title }}</title>
@section('content')
    <div class="container-fluid pt-5" style=" padding: 0">
        @if (Auth::check())
        <form class="mb-5" action="{{ route('order') }}" method="POST">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive">
                    <table class="table table-bordered text-center mb-0">
                        @include('error.error')
                        <thead class="bg-secondary text-dark ">
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th class="col-1">Màu</th>
                                <th class="col-1">Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                                    <td class="align-middle"> <img src="{{asset($sanpham['anh'])}}" alt="{{ $sanpham['anh'] }}"
                                            style="width: 50px;"></td>
                                    <td class="align-middle col-6">
                                        {!! $sanpham['mota'] !!}
                                    </td>
                                    <td >
                                        <input type="text" name="color" id="" value="{{$sanpham['color']}}" disabled style="width:50px">
                                    </td>
                                    <td >
                                        <input type="text" name="size" id="" value="{{$sanpham['size']}}" style="width:50px" disabled>
                                    </td>
                                    <td class="align-middle col-2">{{ number_format($sanpham['gia']) }} VNĐ</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 60px;">
                                            <input type="number"
                                                class="form-control form-control-sm bg-secondary text-center" name="soluong"
                                                value="{{ $sanpham['soluong'] }}" min="1" disabled>
                                        </div>
                                    </td>
                                    <td class="align-middle col-2">{{ number_format($sanpham['soluong'] * $sanpham['gia']) }}
                                        VNĐ</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                        <input type="text" name="ten" class="form-control p-3" placeholder="Tên người nhận">
                        <p class="text-danger">{{ $errors->first('ten') }}</p>
                        <input type="text" name="diachi" class="form-control p-3" placeholder="Địa chỉ">
                        <p class="text-danger">{{ $errors->first('diachi') }}</p>
                        <input type="text" name="sodienthoai" class="form-control p-3" placeholder="Số điện thoại">
                        <p class="text-danger">{{ $errors->first('sodienthoai') }}</p>
                        <input type="text" name="ghichi" class="form-control p-3" placeholder="Ghi chú"><br>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Tổng hóa đơn</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Tổng giá hàng</h6>
                                    <h6 class="font-weight-medium">{{ number_format($sanpham['tongtien']) }} VNĐ</h6>
                                </div>
                            </div>
                            @php
                                $ship = 0;
                            @endphp
                            @if ($sanpham['tongtien'] < 200000)
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">Phí ship</h6>
                                        <h6 class="font-weight-medium">50,000 VNĐ</h6>
                                    </div>
                                </div>
                                @php
                                    $ship = 50000;
                                @endphp
                            @else
                                @if ($sanpham['tongtien'] < 500000)
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-medium">Phí ship</h6>
                                            <h6 class="font-weight-medium">30,000 VNĐ</h6>
                                        </div>
                                    </div>
                                    @php
                                        $ship = 30000;
                                    @endphp
                                @endif
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">Phí ship</h6>
                                        <h6 class="font-weight-medium">0 VNĐ</h6>
                                    </div>
                                </div>
                            @endif
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Tổng hóa đơn</h5>
                                    <h5 class="font-weight-bold">{{ number_format($sanpham['tongtien'] + $ship) }} VNĐ</h5>
                                </div>
                                <button class="btn btn-block btn-primary my-3 py-3" style="submit">Đặt hàng
                                    ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
        @else
            <div class="alert alert-infor alert-dismissible d-flex align-items-center fade show">
                <i class='bx bx-bell'></i>
                <strong class="mx-2">Info!</strong> Bạn cần đăng nhập tài khoản để mua sản phẩm.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>  

    <script>
        $(document).ready(function() {
            $('.btndelete').click(function() {
                if (confirm('Bạn có thật sự muốn xóa không ?')) {
                    $(this).parent().submit();
                    return true;
                } else
                    return false;
            });
        });
    </script>
@endsection
