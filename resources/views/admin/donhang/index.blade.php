@extends('admin.back.master')
@section('css')
    <style>

    </style>
@endsection

@section('content')
    <!-- statistical -->
    <div class="col-md-12">
        <div class="col-md-12">
            <div class=" card-primary">
                <div class="card-header">
                    <h3 class="card-title">Các đơn hàng</h3>
                </div>
                <div class="card-body col-12 col-lg-12">
                    <div class="my-2">
                        @include('error.error')
                    </div>
                    <table class="table table-hover table-border">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Số Điện thoại</th>
                                <th class="text-center">Ghi chú</th>
                                <th class="text-center">Lợi nhuận</th>
                                <th class="text-center">Doanh thu</th>
                                <th class="text-center">Phí ship</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Hành động</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $id => $order)
                                <tr>
                                    <td class="text-center">{{ $id + 1 }}</td>
                                    <td class="text-center">{{ $order->ten }}</td>
                                    <td class="text-center">{{ $order->diachi }}</td>
                                    <td class="text-center">{{ $order->sodienthoai }}</td>
                                    <td class="text-center">{{ $order->ghichu }}</td>
                                    <td class="text-center">{{ number_format($order->loinhuan) }}</td>
                                    <td class="text-center">{{ number_format($order->doanhthu) }}</td>
                                    <td class="text-center">
                                        @if ($order->doanhthu <= 200000)
                                            50,000 VNĐ
                                        @elseif($order->doanhthu <= 500000)
                                            30,000 VNĐ
                                        @else
                                            0 VNĐ
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($order->trangthai == 1)
                                            Chờ
                                        @else
                                            Đã xác nhận
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('adminorder.edit', ['order' => $order->id]) }}"
                                            class="text-info"><i class="fa-regular fa-pen-to-square"></i></a>|
                                        <form class="d-inline-block" action="{{ route('adminorder.destroy', ['order' => $order->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('adminorder.destroy', ['order' => $order->id]) }}"
                                                class="text-danger btndelete"><i
                                                    class="fa-sharp fa-solid fa-trash "></i></a>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route('adminorder.show',['order'=> $order->id])}}" class="btn btn-outline-secondary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">{{ $danhmucs->links() }}</div> --}}
                    {{-- <p class="d-flex justify-content-end">
                       <a class="btn btn-info btn-sm" href="{{ route('admincat.create') }}">Thêm danh mục</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btndelete').click(function() {
                if (confirm('Bạn có thật sự muốn xóa không ?')) {
                    $(this).parent().submit();
                    return false;
                } else
                    return false;
            });
        });
    </script>
@endsection
