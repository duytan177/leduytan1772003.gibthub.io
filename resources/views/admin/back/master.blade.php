<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Master Page-->
    <title>Trang Quản Trị</title>
    @include('libs.toplibs')
    @yield('css')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col px-0">
            @include('admin.back.navbar')
        </div>
    </div><!--Navigation bar-->
    <div class="row">
        <div class="col p-0">
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    @include('admin.back.sidebar')
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <div class="row mt-3">
                                <div class="col">
                                    <!-- Main content -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-12">
                                                    <!-- jquery validation -->
                                                    <div class="card" style="background-color: #F4F6F9">
                                                        <div style="width: 100%; height: 30px;; margin-top: 5px">
                                                            <h3 class="card-title">{{$title}}</h3>
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-12">
                                                    @yield('content')
                                                </div><!--Change Content-->
                                            </div><!-- /.row -->
                                        </div><!-- /.container-fluid -->
                                    </section>
                                </div>
                            </div>
                        </div>
                    </main><!--Left Content-->
                    @include('admin.back.footer')
                </div>
            </div>
        </div>
    </div><!---->
</div>
@include('libs.bottomlibs')
@stack('js')
</body>

</html>
