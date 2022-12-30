@extends('front.master')
<link href="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/index.scss.css?1665385137191" rel="stylesheet"
    type="text/css" />
<link href="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/responsive.scss.css?1665385137191" rel="stylesheet"
    type="text/css" />

<link rel="preload" as="script" href="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/jquery.js?1665385137191" />
<script src="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/jquery.js?1665385137191" type="text/javascript">
</script>
<link rel="preload" as="script" href="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/lazy.js?1665385137191" />
<script src="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/lazy.js?1665385137191" type="text/javascript">
</script>
<link rel="preload" as="script"
    href="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/slick.js?1665385137191" />
<script src="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/slick.js?1665385137191" type="text/javascript">
</script>
@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide carousel--hiden" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/images/ao-so-mi-nhung-tam.jpg" alt="Los Angeles" class="d-block"
                    style="width:80%;height: 600px ; margin: auto 10%">
                <div class="carousel-caption">
                    <h3>Chào mừng bạn đến với của hàng chúng tôi</h3>
                    <p>Chúc bạn có những sản phẩm chất lượng từ của hàng chúng tôi</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="public/images/Ao-oversize.jpg" alt="Chicago" class="d-block"
                    style="width:80%;height: 600px;margin: auto 10%">
                <div class="carousel-caption">
                    <h3>Chương trình giảm giá vào ngày 1/1/2023</h3>
                    <p>Áp dụng cho các sản phẩm tại của hàng</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="public/images/sweater.jpg" alt="New York" class="d-block"
                    style="width:80%;height: 600px;margin: auto 10%">
                <div class="carousel-caption">
                    <h3>Cảm ơn quý khách đã ủng hô của hàng</h3>
                    <p>Hẹn gặp lại quý khách </p>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <hr style="width: 80%; margin-left: 10%; ">
    <div class="container text-center">
        <div class="row shopping">
            @foreach ($result as $value)
                <div class=" shopping-list">
                    <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}" class="shopping-list-item">
                        <img src="{{ $value->anh }}" class="image--style" alt="Ảnh sản phẩm">
                    </a>
                    <br>
                    <a href="#" class="shopping-list-item">{{ $value->tensp }}</a>
                    <p>{{ number_format($value->gia) }}VNĐ <span style="text-decoration: line-through"
                            class="shopping-list-item">{{ number_format($value->gia + $value->gia * 0.2) }}VNĐ</span></p>

                    <form action="{{ route('addToCart', ['id' => $value->idsp]) }}" class="shopping-list-item"
                        method="GET">
                        <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}" class="btn btn-info"><i
                                class="fa-solid fa-eye"></i></a>
                        <button type="submit" value="cart" class="btn btn-primary"><i
                                class='bx bxs-cart-add'></i></button>
                    </form>
                </div>
            @endforeach
            <div class="banner_1">
                <a href="#" title="Hàng mới về" style="margin-top: 20px">
                    <img style="width: 100%;height:200px;" src="{{ asset('public/images/jean.jpg') }}"
                        data-src="//bizweb.dktcdn.net/100/091/133/themes/880367/assets/banner1.jpg?1665385137191"
                        alt="Hàng mới về" class="img-responsive lazyload">
                    <div class="text-hover">
                        <span>Hàng mới về</span>
                    </div>
                </a>
            </div>
            @foreach ($resultNew as $value)
            <div class=" shopping-list">
                <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}" class="shopping-list-item">
                    <img src="{{ $value->anh }}" class="image--style" alt="Ảnh sản phẩm">
                </a>
                <br>
                <a href="#" class="shopping-list-item">{{ $value->tensp }}</a>
                <p>{{ number_format($value->gia) }}VNĐ <span style="text-decoration: line-through"
                        class="shopping-list-item">{{ number_format($value->gia + $value->gia * 0.2) }}VNĐ</span></p>

                <form action="{{ route('addToCart', ['id' => $value->idsp]) }}" class="shopping-list-item"
                    method="GET">
                    <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}" class="btn btn-info"><i
                            class="fa-solid fa-eye"></i></a>
                    <button type="submit" value="cart" class="btn btn-primary"><i
                            class='bx bxs-cart-add'></i></button>
                </form>
            </div>
        @endforeach
        </div>
    </div>
    
@endsection
