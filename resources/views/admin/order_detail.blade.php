@extends('front.master')
@section('content')
 <div class="container">
 <div class="row">
 <div class="col-sm-8">
 <h5>Thông tin chi tiết đơn hàng của {{ Auth::user()->name }}</h5>
 <h6>Chức năng này đang cập nhật !</h6>
 </div>
 </div>
 </div>
@endsection
