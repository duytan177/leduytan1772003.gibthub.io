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
    <div class="container-fluid pt-5" style=" padding: 0;"">
        @if (Auth::check())
            <div class="row px-xl-5">
                @if (!empty($cart[0]))
                    <div class="col-lg-8 table-responsive">
                        <table class="table table-bordered text-center mb-0">
                            @include('error.error')
                            <thead class="bg-secondary text-dark ">

                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <td>Màu</td>
                                    <td>Size</td>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody class="align-middle">
                                @foreach ($cart as $id => $value)
                                    <form action="{{ route('updateCart', ['id' => $value->id]) }}" method="GET">
                                        <td class="align-middle">{{ $id + 1 }}</td>
                                        <td class="align-middle"> <img src="{{ $value->anh }}" alt="{{ $value->anh }}"
                                                style="width: 50px;"></td>
                                        <td class="align-middle col-6">
                                            {!! $value->mota !!}
                                        </td>
                                        <td class="col-1">
                                            <select name="color" id="color">
                                                @for ($i = 0; $i < count($colors[$value->id]); $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $colors[$value->id][$i] == $value->color ? 'selected' : 'fasle' }}>
                                                        {{ $colors[$value->id][$i] }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td class="col-1">
                                            <select name="size" id="">
                                                @for ($i = 0; $i < count($sizes[$value->id]); $i++)
                                                <option value="{{ $i }}"
                                                {{ $sizes[$value->id][$i] == $value->size ? 'selected' : 'fasle' }}>
                                                {{ $sizes[$value->id][$i] }}
                                               </option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td class="align-middle col-2">{{ number_format($value->gia) }} VNĐ</td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 60px;">
                                                <input type="number"
                                                    class="form-control form-control-sm bg-secondary text-center"
                                                    name="soluong" value="{{ $value->soluong }}" min="1">
                                            </div>
                                        </td>
                                        <td class="align-middle col-2">{{ number_format($value->soluong * $value->gia) }}
                                            VNĐ</td>
                                        <td class="align-middle input-group"
                                            style="margin-top:  25%;margin-left: 5%; border:none">
                                            <button type="submit" class="text-info"
                                                style="border: none; background: yellow
                        ">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <a style="margin-top:1px; margin-left: 5.5px"
                                                href="{{ route('destroy', ['id' => $value->id]) }}"
                                                class="text-danger btndelete"><i
                                                    class="fa-sharp fa-solid fa-trash "></i></a>
                                        </td>
                                    </form>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4" style="text-color:aqua">
                        <form class="mb-5" action="{{route('adminorder.store')}}" method="POST">
                            @csrf
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
                                        <h6 class="font-weight-medium">{{ number_format($total) }} VNĐ</h6>
                                    </div>
                                </div>
                                @php
                                    $ship = 0;
                                @endphp
                                @if ($total < 200000)
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
                                    @if ($total < 500000)
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-medium">Phí ship</h6>
                                                <h6 class="font-weight-medium">30,000 VNĐ</h6>
                                            </div>
                                        </div>
                                        @php
                                            $ship = 30000;
                                        @endphp
                                    @else

                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-medium">Phí ship</h6>
                                            <h6 class="font-weight-medium">0 VNĐ</h6>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                <div class="card-footer border-secondary bg-transparent">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5 class="font-weight-bold">Tổng hóa đơn</h5>
                                        <h5 class="font-weight-bold">{{ number_format($total + $ship) }} VNĐ</h5>
                                    </div>
                                    <button class="btn btn-block btn-primary my-3 py-3" style="submit">Đặt hàng
                                        ngay</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
        @else
            @if (Session::has('success'))
                {{-- <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div> --}}
                
            @else
            <div class="alert alert-infor alert-dismissible d-flex align-items-center fade show" style="height: 350px;">
                <i class='bx bx-error-alt' ></i>
                <strong class="mx-2"></strong> Giỏ hàng hiện tại đang trống.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
        @endif
    @else
    <div class="alert alert-infor alert-dismissible d-flex align-items-center fade show" style="height: 350px;"> 
        <i class='bx bx-bell' ></i>
        <strong class="mx-2">Info!</strong> Bạn cần đăng nhập tài khoản để thêm vào giỏ hàng.
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
