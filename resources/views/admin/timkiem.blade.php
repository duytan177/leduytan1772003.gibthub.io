@extends('admin.back.master')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.back.statistical')
        <div class="col-sm-10">
            {{-- <h5>Danh Sách Sản Phẩm Sau Khi Tìm</h5> --}}
            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                    <th class="bg-primary">Tên Danh Mục</th>
                    <th class="bg-primary">Mã Sản Phẩm</th>
                    <th class="bg-primary">Tên Sản Phẩm</th>
                    <th class="bg-primary">Giá</th>
                </thead>
                <tbody>
                    @foreach($result as $row)
                    <tr>
                        <td>{{ $row->tendm }}</td>
                        <td>{{ $row->masp }}</td>
                        <td>{{ $row->tensp }}</td>
                        <td>{{ $row->gia }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>      
        </div>
    </div>
</div>
@endsection