

<nav class="header__navbar">
    <ul class="navbar-list">
        <li class="navbar-item ">
            <a href="{{route('home')}}">
                <img src="{{asset('public/logo.png')}}" alt="Logo" style="height: 70px;">
            </a>
        </li>
    </ul>
    <ul class="navbar-list">
        <li class="navbar-item navbar--hiden mx-2 header-dash"  style="padding-right: 10px">
            <a href="{{route('lienhe')}}"><i class="bx bxs-phone"></i>Liên hệ</a>
        </li>
        <li class="navbar-item nav-link mx-2 navbar--hiden header-dash">
                <nav class="bg-white">
                        <form class="d-flex" role="search" action="{{route('find')}}" method="GET" >
                        
                            <button style="border: none" class="bg-white" type="submit"><i
                                    class="bx bx-search"></i></button>
                            <input style="border: none" name="search" type="search" placeholder="Search" aria-label="Search" class="input_search" autocomplete>
                        </form>
                </nav>
        </li>
        @auth
        <div class=" nav-link navbar-item btn-group mx-2 dropdown header-dash" >
            <a class="dropdown" aria-current="page" href=""><i class="bx bxs-user"></i>{{Auth::user()->name}} <i class='bx bxs-down-arrow'></i></a>
            <button class="dropbtn" type="button" class="dropdown-toggle-split" style="border: none" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu dropdown-content" style="margin: 0;">
                <form action="{{route('logout')}}" method="POST" class=" " >
                    @csrf
                    @if (Auth::user()->typeuser == 1)
                    <a href="{{route('admin')}}" ">Danh mục</a>
                    <hr>
                    @endif
                    @if (Auth::user()->typeuser == 2 )
                        <a href="{{route('infor',['id' => Auth::user()->id ])}} " >Thông tin tài khoản</a>
                        <hr>
                    @endif
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Đăng xuất</a>
                </form>
            </ul>
        </div>

        @else
        <a class="nav-link navbar-item mx-2 header-dash" href="{{route('login')}}"><i class='bx bxs-lock-alt'></i><span class="navbar--hiden--phone"> Đăng nhập</span></a>
        <a class="nav-link navbar-item mx-2 header-dash" href="{{route('register')}}"><i class='bx bxs-lock-open-alt'></i><span class="navbar--hiden--phone"> Đăng Ký</span></a>            
        @endif
      
        <div class="nav-link navbar-item mx-2 navbar--hiden" > 
            <a class="nav-link navbar-item mx-2 navbar--hiden" style="color: #363636" href="{{route('cart')}}"><i class='bx bxs-cart-add'></i>Giỏ hàng
            </a>
            </div>

        
        
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <a class="nav-link mx-4" aria-current="page" href="{{route('home')}}">Trang chủ</a>
                <a class="nav-link mx-4" aria-current="page" href="{{route('gioithieu')}}">Giới thiệu</a>
                <div class="btn-group mx-4 dropdown">
                    <a class="nav-link dropdown" aria-current="page" href="{{route('sanpham')}}">Sản phẩm</a>
                    <button class="dropbtn bg-dark" type="button" class="dropdown-toggle-split bg-dark" style="border: none" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-down-arrow'></i>
                    </button>
                    <ul class="dropdown-menu dropdown-content">
                      <li><a class="dropdown-item" href="?find=hoddies">Áo mùa đông</a></li>
                      <li><a class="dropdown-item" href="?find=áo thun">Áo thun</a></li>
                      <li><a class="dropdown-item" href="?find=áo sơ mi">Áo sơ mi</a></li>
                      <li><a class="dropdown-item" href="?find=quần ngắn">Quần ngắn</a></li>
                      <li><a class="dropdown-item" href="?find=quần dài">Quần dài</a></li>
                    </ul>
                  </div>
                <a class="nav-link mx-4" href="#">Dịch vụ</a>
                <a class="nav-link mx-4" href="{{route('map')}}">Bản đồ</a>
                <a class="nav-link mx-4" href="{{route('lienhe')}}">Liên hệ</a>
            </ul>
        </div>
  </div>
</nav>