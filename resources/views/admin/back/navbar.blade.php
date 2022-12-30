<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #343A40">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">Shop thời trang</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form action="{{ route('adminTimkiem') }}" method="post" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        @csrf
        <div class="input-group">
            <input class="form-control" name="search" type="text" placeholder="Tìm kiếm ..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{Auth::user()->name}}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Hồ Sơ</a></li>
                <li><a class="dropdown-item" href="#">Tin Nhắn</a></li>
                <li><hr class="dropdown-divider" /></li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit()">Đăng Xuất</a></li>
                </form>
            </ul>
        </li>
    </ul>   
</nav>
