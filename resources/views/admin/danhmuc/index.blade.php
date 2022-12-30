@extends('admin.back.master')
@section('css')
    <style>
        
    </style>
@endsection

@section('content')
    <!-- statistical -->
    <div class="col-md-12">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                   <h3 class="card-title">Danh Mục Sản Phẩm</h3>
                </div>         
                <div class="card-body col-12 col-lg-8">
                    <div class="my-2">
                        @include('error.error')
                    </div>
                    <table class="table table-hover table-border">
                        <thead>
                        <tr>
                            <th>Mã DM</th>
                            <th>Tên Danh Mục</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($danhmucs as $danhmuc)
                        <tr>
                            <td>{{ $danhmuc->iddm }}</td>
                            <td>{{ $danhmuc->tendm }}</td>
                            <td>
                                <a href="{{ route('admincat.edit', $danhmuc->iddm) }}" class="text-info"><i class="fa-regular fa-pen-to-square"></i></a>|
                                <form class="d-inline-block" action="{{route('admincat.destroy', $danhmuc->iddm)}}" method="post">
                                     @csrf
                                     @method('DELETE')
                                     <a href="{{route('admincat.destroy',$danhmuc->iddm)}}" class="text-danger btndelete"><i class="fa-sharp fa-solid fa-trash "></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                   <div class="mt-3">
                    {{ $danhmucs->links('pagination::bootstrap-5') }}
                </div>
                    {{-- <p class="d-flex justify-content-end">
                       <a class="btn btn-info btn-sm" href="{{ route('admincat.create') }}">Thêm danh mục</a>
                    </p> --}}
                </div>
            </div>
            <!-- /.card -->
            </div>
    </div>
    <script>
         $(document).ready(function(){
            $('.btndelete').click(function(){
                if(confirm('Bạn có thật sự muốn xóa không ?'))
                {
                    $(this).parent().submit();
                    return true;
                }else
                    return false;
            });
        });
    </script>
@endsection


