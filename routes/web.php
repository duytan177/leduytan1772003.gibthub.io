<?php

use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\DanhMucSanPhamController;
use App\Http\Controllers\admin\DashController;
use App\Http\Controllers\admin\DemoController;
use App\Http\Controllers\admin\FindController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SanPham as AdminSanPham;
use App\Http\Controllers\SanPham;
use App\Http\Controllers\admin\SanPhamController;
use App\Http\Controllers\admin\ThongKeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('/orderdetail',function(){
   return view('admin.order_detail');
  })->name('detail')->middleware('UserRole');
  Route::get('/lienhe',function(){
   return view('navbar.lienhe');
  })->name('lienhe');
  
Route::prefix('/')->group(function(){
   Route::get('/',[AdminSanPham::class,'index'])->name('home');
   Route::get('/gioithieu',function(){
      return  view('navbar.gioithieu');
   })->name('gioithieu');
   Route::get('/bando',function(){
      return  view('navbar.map');
   })->name('map');
   Route::get('/timkiem',[AdminSanPham::class,'view_sanpham'])->name('find');
   Route::get('thongtintaikhoan/{id}',[AdminSanPham::class,'infor'])->name('infor');
   Route::post('/capnhapthongtin/{id}',[AdminSanPham::class,'update'])->name('update');
   Route::get('cacdonhang/{id}',[AdminSanPham::class,'inforOrder'])->name('inforOrder');
   Route::get('chitietdonhang/{id}',[AdminSanPham::class,'detailOrder'])->name('detailOrder');
   Route::get('/sanpham',[AdminSanPham::class,'view_sanpham'])->name('sanpham');
   Route::get('/chitietsanpham/{id}',[AdminSanPham::class,'show'])->name('chitietsanpham');
   Route::get('/muasanpham/{id}',[AdminSanPham::class,'buy'])->name('muasanpham');
   Route::post('/muasanpham',[AdminSanPham::class,'order'])->name('order');
   Route::get('/cart',[CartController::class,'index'])->name('cart');
   Route::get('/carttoadd/{id}',[CartController::class,'addToCart'] )->name('addToCart');
   Route::get('/update-cart/{id}',[CartController::class,'updateCart'])->name('updateCart');
   Route::get('/destroy/{id}',[CartController::class,'destroy'])->name('destroy');
   Route::get('/danhsachyeuthich/{id}',[AdminSanPham::class,'detailLike'])->name('detailLike');
   Route::get('/like/{id}',[AdminSanPham::class,'like'])->name('like');
   Route::get('/deletelike/{id}',[AdminSanPham::class,'deleteLike'])->name('deleteLike');
});

Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('reset-password/{token}', 'ResetPasswordController@reset');

Route::name('admin')->group(function(){
     Route::prefix('admin')->group(function(){
        //Route::resource('/',DashController::class);
        Route::resources([
           'cat'=>DanhMucSanPhamController::class,
           'pro'=>SanPhamController::class,
           'user' => UserController::class,
           'order' => OrderController::class,
           'review' => ReviewController::class
        ]);
        Route::get('/',[DanhMucSanPhamController::class,'admin']);
        Route::get('/thongkedoanhso',[ThongKeController::class,'index'])
        ->name('Thongke');
        Route::get('thongkeluotthich',[ThongKeController::class,'like'])
        ->name('like');
        Route::post('timkiem',[FindController::class,'find'])
        ->name('Timkiem');
        Route::get('/inhoadon/{order}',[OrderController::class,'printOrder'])->name('printOrder');
     });
});





