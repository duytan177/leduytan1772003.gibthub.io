@extends('admin.back.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="my-2">
                    @include('error.error')
                </div>
                <table class="table table-hover table-boder">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Mã SP</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Màu sắc</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                    @if($dssp)<?php $i = 1; ?>
                        @foreach($dssp as $sp)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                               
                             <img src="{{asset($sp->anh)}}" alt="{{$sp->anh}}" style="height: 50px;width:50px">
                            </td>
                            <td>{{ $sp->masp }}</td>
                            <td>{{ $sp->tensp }}</td>
                            <td>{{ $sp->color}}</td>
                            <td>{{$sp->size}}</td>
                            <td>{{ number_format($sp->gia).'VNĐ' }}</td>
                            <td>{{$sp->soluong}}</td>
                            <td>
                                <a class="text-info" href="{{ route('adminpro.edit',$sp->idsp) }}"><i class="fa-regular fa-pen-to-square"></i></a> | 
                                <form class="framedelete d-inline" action="{{ route('adminpro.destroy',$sp->idsp) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="text-danger btndelete" href=""><i class="fa-sharp fa-solid fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </table>
                <div class="mt-3">
                    {{ $dssp->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.btndelete').click(function(){
                if(confirm('Bạn có thật sự muốn xóa không ?'))
                {
                    $(this).parent().submit();
                    return false;
                }else
                    return false;
            });
        });
    </script>
@endsection