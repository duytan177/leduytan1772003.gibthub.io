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
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">1:admin|2:user</th>
                            <th class="text-center">Hành động</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $id => $user)
                        <tr>
                            <td class="text-center">{{ $id+1 }}</td>
                            <td  class="text-center">{{ $user->name }}</td>
                            <td  class="text-center">{{$user->email}}</td>
                            <td class="text-center">{{$user->typeuser}}</td>
                            <td  class="text-center">
                                <a href="{{route('adminuser.edit',['user' => $user->id])}}" class="text-info"><i class="fa-regular fa-pen-to-square"></i></a>|
                                <form class="d-inline-block" action="{{route('adminuser.destroy',['user'=> $user->id])}}" method="post">
                                     @csrf
                                     @method('DELETE')
                                     <a href="{{route('adminuser.destroy',['user'=> $user->id])}}" class="text-danger btndelete"><i class="fa-sharp fa-solid fa-trash "></i></a>
                                </form>
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
            <!-- /.card -->
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
