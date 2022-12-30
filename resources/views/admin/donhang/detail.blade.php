@extends('admin.back.master')
<!-- Google Web Fonts -->
<style>
    /*Icon progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 20%;
        float: left;
        position: relative;
        font-weight: 400;
    }

    #progressbar .step0:before {
        font-family: FontAwesome;
        content: "\f10c";
        color: #fff;
    }

    #progressbar li:before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #C5CAE9;
        border-radius: 50%;
        margin: auto;
        padding: 0px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 12px;
        background: #C5CAE9;
        position: absolute;
        left: 0;
        top: 16px;
        z-index: -1;
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%;
    }

    #progressbar li:nth-child(3):after,
    #progressbar li:nth-child(4):after {
        left: -50%;
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%;
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #651FFF;
    }

    #progressbar li.active:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px;
    }

    .icon-content {
        padding-bottom: 20px;
    }

    @media screen and (max-width: 992px) {
        .icon-content {
            width: 50%;
        }
    }

    @media screen and (max-width: 1200px) {
        .box {
            height: 50px;
            width: 100px;
            font-size: 12px;
        }

        .icon {
            height: 70%;
            width: 60%
        }
    }
</style>
<title>{{ $title }}</title>
@section('content')
<div class="col-md-12">
    <div class="col-md-12">
        <div class=" card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body col-12 col-lg-12">
                <div class="my-2">
                    @include('error.error')
                </div>
            <div>
                <a href="{{route('adminprintOrder',['order'=>$id])}}" class="btn btn-outline-secondary" style="float: right">Xuất hóa đơn</a>
            </div>
        <div class="row mt-5">
            <div class="col">
                <div class=" mx-auto">
                    <div class="row d-flex justify-content-between  ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="col-4">Ảnh</th>
                                    <th class="col-3">Sản phẩm</th>
                                    <th>Màu sắc</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailOrder as $id => $order)
                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($order->anh) }}" alt="ảnh sản phẩm"
                                                style="height: 20%;width: 30%">
                                        </td>
                                        <td>{!! $order->mota !!}</td>
                                        <td>{{ $order->color }}</td>
                                        <td>{{ $order->size }}</td>
                                        <td>{{ $order->soluong }}</td>
                                        <td>{{ number_format($order->soluong * $order->gia) }}</td>
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
