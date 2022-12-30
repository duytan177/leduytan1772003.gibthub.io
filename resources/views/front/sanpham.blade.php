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
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-3 navbar--hiden--phone border--left">
                <div class="flex-shrink-0 p-3 bg-white" style="width: 100%;">
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none"
                        data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        {{-- <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg> --}}
                        <span class="fs-5 fw-semibold navbar-brand">Trang chủ</span>
                    </a>
                    <ul class="list-unstyled ps-0 container-fluid">
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#winter-collapse" aria-expanded="true">
                                <i class='bx bxs-down-arrow'></i>
                                Áo mùa đông
                            </button>
                            <div class="collapse" id="winter-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="?find=hoddies" class="link-dark rounded">Hoddies</a></li>
                                    <li><a href="?find=sweater" class="link-dark rounded">Sweater</a></li>
                                    <li><a href="?find=áo phao" class="link-dark rounded">Áo phao</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#home-collapse" aria-expanded="true">
                                <i class='bx bxs-down-arrow'></i>
                                Áo thun
                            </button>
                            <div class="collapse" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="?find=oversize" class="link-dark rounded">Oversize</a></li>
                                    <li><a href="?find=áo thun" class="link-dark rounded">Áo thun basic</a></li>
                                    <li><a href="?find=áo secondhand" class="link-dark rounded">Áo thun secondhand</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dashboard-collapse" aria-expanded="false">
                                <i class='bx bxs-down-arrow'></i>
                                Áo sơ mi
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="?find=sơ mi nhung tằm" class="link-dark rounded">Sơ mi nhung tằm</a></li>
                                    <li><a href="?find=sơ mi tay ngắn" class="link-dark rounded">Sơ mi ngắn tay</a></li>
                                    <li><a href="?find=sơ mi dài tay" class="link-dark rounded">Sơ mi dài tay</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#orders-collapse" aria-expanded="false">
                                <i class='bx bxs-down-arrow'></i>
                                Quần ngắn
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="?find=quần ngắn kaki" class="link-dark rounded">Quần ngắn kaki</a></li>
                                    <li><a href="?find=quần ngắn thể thao" class="link-dark rounded">Quần ngắn thể thao</a>
                                    </li>
                                    <li><a href="?find=quần ngắn nhung tăm" class="link-dark rounded">Quần ngắn nhung
                                            tăm</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                                data-bs-target="#account-collapse" aria-expanded="false">
                                <i class='bx bxs-down-arrow'></i>
                                Quần dài
                            </button>
                            <div class="collapse" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="?find=baggy" class="link-dark rounded">Quần baggy</a></li>
                                    <li><a href="?find=quần jean" class="link-dark rounded">Quần jean</a></li>
                                    <li><a href="?find=quần nhung tằm" class="link-dark rounded">Quần nhung tăm</a></li>
                                    <li><a href="?find=quần ống rộng" class="link-dark rounded">Quần ống rộng</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </aside>

            <section class="col" style="margin: 22px auto">
                <h4>Sản phẩm</h4>
                <form action="{{ route('sanpham') }}" method="GET">

                    <label for="">Sắp xếp:</label>
                    <select name="sapxep">
                        <option value="macdinh" {{ $orderby == 'macdinh' ? 'selected' : false }}>Mặc định </option>
                        <option value="a-z" {{ $orderby == 'a-z' ? 'selected' : false }}>A -> Z </option>
                        <option value="z-a" {{ $orderby == 'z-a' ? 'selected' : false }}>Z -> A</option>
                        <option value="re" {{ $orderby == 're' ? 'selected' : false }}>Giá rẻ nhất</option>
                        <option value="dat" {{ $orderby == 'dat' ? 'selected' : false }}>Giá đắt nhất</option>
                        <option value="moi" {{ $orderby == 'moi' ? 'selected' : false }}>Sản phẩm mới</option>
                        <option value="cu" {{ $orderby == 'cu' ? 'selected' : false }}>Sản phẩm cũ</option>
                    </select>
                    <button type="submit" class="btn btn-outline-info">Lọc dữ liệu</button>
                </form>
                <div class="container text-center" style="margin-left: 20px">
                    <div class=" shopping">
                        @foreach ($result as $value)
                            <div class=" shopping-list">
                                <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}"
                                    class="shopping-list-item">
                                    <img src="{{ $value->anh }}" class="image--style" alt="Ảnh sản phẩm">
                                </a>
                                <br>
                                <a href="#" class="shopping-list-item">{{ $value->tensp }}</a>
                                <p>{{ number_format($value->gia) }}VNĐ <span style="text-decoration: line-through"
                                        class="shopping-list-item">{{ number_format($value->gia + $value->gia * 0.2) }}VNĐ</span>
                                </p>
                                <form action="{{ route('addToCart', ['id' => $value->idsp]) }}"
                                    class="shopping-list-item" method="GET">
                                    <a href="{{ route('chitietsanpham', ['id' => $value->idsp]) }}"
                                        class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                    <button type="submit" value="cart" class="btn btn-primary"><i
                                            class='bx bxs-cart-add'></i></button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <div class="mt-3">
              {{ $result->links('pagination::bootstrap-5') }}
          </div>
        </div>
    </div>
@endsection
