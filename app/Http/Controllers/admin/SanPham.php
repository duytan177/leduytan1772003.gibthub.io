<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\admin\SanPhamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Switch_;

class SanPham extends Controller
{
  private $sanpham;
  public function __construct()
  {
    $this->sanpham = new SanPhamModel();
  }

  public function index()
  {
    $title = 'Trang chủ';
    $result = $this->sanpham->getAll();
    $resultNew = DB::table('sanphams')->orderBy('created_at', 'desc')->paginate(8);

    return view('home', ['result' => $result, 'resultNew' => $resultNew, 'title' => $title]);
  }

  public function view_sanpham(Request $request)
  {
    $title = 'Sản phẩm';
    $keyword = $request->search;
    $orderby = $request->sapxep;
    $filter = [];
    $sapxep = 'idsp';
    $type = "asc";
    if ($keyword != null) {
      $filter[] = ['mota', 'like', '%' . $keyword . '%'];
    }
    if ($request->find != null) {
      $filter[] = ['mota', 'like', '%' . $request->find . '%'];
    }
    if ($orderby != null) {
      switch ($orderby) {
        case 'a-z':
          $sapxep = 'mota';
          break;
        case 'z-a':
          $sapxep = 'mota';
          $type = 'desc';
          break;
        case 're':
          $sapxep = 'gia';
          break;
        case 'dat':
          $sapxep = 'gia';
          $type = 'desc';
          break;
        case 'moi':
          $sapxep = 'created_at';
          $type = 'desc';
          break;
        case 'cu':
          $sapxep = 'created_at';
          break;
      }
    }
    $result = $this->sanpham->getSanPham($filter, $sapxep, $type);
    $result = $result->paginate(12)->withQueryString();


    return view('front.sanpham', ['result' => $result, 'orderby' => $orderby, 'title' => $title]);
  }


  public function show($idsp)
  {
    $title = 'Xem chi tiết sản phẩm';
    $sanpham = DB::table('sanphams')->where('idsp', $idsp)->get();

    $size = explode('|', $sanpham[0]->size);
    $color = explode('|', $sanpham[0]->color);
    $masp = DB::table('sanphams')->where('idsp', $idsp)->get();
    $reviews = DB::table('danhgias')->where('masp', $masp[0]->masp)->get();
    $users = DB::table('users')->get(['id', 'name']);
    $count = count($reviews);
    $ten = [];
    $total = 1;
    for ($i  = 0; $i < $count; $i++) {
      foreach ($users as $id =>  $user) {
        if ($reviews[$i]->user_id == $user->id) {
          $ten[$user->id] = $user->name;
        }
      }
    }
    $total = $count;
    if ($total == 0) {
      $total = 1;
    }
    return view('front.chitietsanpham', ['title' => $title, 'total' => $total, 'reviews' => $reviews, 'sodanhgia' => $count, 'ten' => $ten, 'color' => $color, 'size' => $size, 'sanpham' => $sanpham]);
  }


  public function buy(Request $request, $id)
  {

    $gia = DB::table('sanphams')->where('idsp', $id)->get();
    if ($gia[0]->soluong > 0) {
      if ($request->giohang == 'Thêm vào giỏ hàng' && Auth::check()) {
        $params = [
          'sanpham_id' => $id,
          'user_id' => Auth::user()->id,
          'mota' => $gia[0]->mota,
          'gia' => $gia[0]->gia,
          'color' => $request->color,
          'size' => $request->size,
          'anh' => $gia[0]->anh,
          'soluong' => $request->soluong
        ];
        DB::table('carts')->insert($params);
        return redirect()->route('cart')->with('success', 'Thêm vào giỏ hàng thành công');
      } else {
        session()->flash('sanpham');
        $param = [
          'id' => $id,
          'anh' => $gia[0]->anh,
          'mota' => $gia[0]->mota,
          'color' => $request->color,
          'size' => $request->size,
          'gia' => $gia[0]->gia,
          'soluong' => $request->soluong,
          'tongtien' => $gia[0]->gia * $request->soluong
        ];
        session()->put('sanpham', $param);
        $sanpham = session()->get('sanpham');
        return view('front.buynow', ['title' => 'Sản phẩm', 'sanpham' => $sanpham]);
      }
    } else {
      return redirect()->back()->with('error', 'Sản phẩm đã hết hàng');
    }
  }
  public function order(OrderRequest $request)
  {
    $sanphams = session()->get('sanpham');
    if ($sanphams) {
      $userID = Auth::user()->id;
      $sanpham = session()->get('sanpham');
      $param = [
        'user_id' => $userID,
        'ten' => $request->ten,
        'diachi' => $request->diachi,
        'sodienthoai' => $request->sodienthoai,
        'ghichu' => $request->ghichu,
        'loinhuan' => ($sanpham['tongtien'] * 20) / 100,
        'doanhthu' => $sanpham['tongtien']
      ];
      DB::table('orders')->insert($param);
      $detailOrders = DB::table('orders')->orderBy('id', 'desc')->first();
      $detail = [
        'order_id' => $detailOrders->id,
        'sanpham_id' => $sanphams['id'],
        'mota' => $sanphams['mota'],
        'gia' => $sanphams['gia'],
        'color' => $sanphams['color'],
        'size' => $sanphams['size'],
        'soluong' => $sanphams['soluong'],
        'anh' => $sanphams['anh']
      ];
      DB::table('detailorder')->insert($detail);
      session()->forget('sanpham');
      return redirect()->route('home')->with('success', 'Đặt hàng thành công');
    } else {
      return redirect()->route('home')->with('error', 'Đặt hàng thất bại');
    }
  }



  public function infor($id)
  {
    $result = DB::table('users')->where('id', $id)->get();
    return view('front.information', ['result' => $result, 'title' => 'Thông tin tài khoản']);
  }

  public function update(Request $request, $id)
  {
    $user = DB::table('users')->where('id', $id)->get();
    if ($id) {

      if (Hash::check($request->password_old, $user[0]->password) && $request->password == $request->password_again) {
        $param = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password == $user[0]->password ? $user[0]->password : Hash::make($request->password)
        ];
        DB::table('users')->where('id', $id)->update($param);
        return redirect()->back()->with('success', 'Cập nhập tài khoản thành công !');
      } else {
        return redirect()->back()->with('error', 'Mật khẩu xác nhận thất bại !');
      }
    } else {
      return redirect()->back()->with('error', 'Cập nhập thông tin thật bại');
    }
  }

  public function inforOrder($id)
  {
    $orders = DB::table('orders')->where('user_id', $id)->get();
    return view('front.thongtindonhang', ['orders' => $orders, 'title' => 'Thông tin đơn hàng']);
  }

  public function detailOrder($id)
  {
    if ($id) {
      $detailOrder = DB::table('detailorder')->where('order_id', $id)->get();
      $status = DB::table('orders')->where('id', $id)->first('trangthai');

      return view('front.chitietdonhang', ['detailOrder' => $detailOrder, 'status' => $status, 'title' => 'Chi tiết đơn hàng']);
    } else {
      return redirect()->back()->with('error', 'Xem chi tiết thất bại!');
    }
  }


  public function like($id)
  {
    $user_id = Auth::user()->id;
    if ($user_id) {
      $check = DB::table('yeuthichs')->where('user_id', $user_id)->where('sanpham_id', $id)->first();
      if (empty($check)) {
        $param = [
          'user_id' => $user_id,
          'sanpham_id' => $id
        ];
        DB::table('yeuthichs')->insert($param);
        return redirect()->back()->with('success', 'Cảm ơn bạn dã thích sản phẩm của chúng tôi!');
      } else {
        DB::table('yeuthichs')->where('user_id', $user_id)->where('sanpham_id', $id)->delete();
        return redirect()->back()->with('error', 'Bạn đã bỏ yêu thích sản phẩm!');
      }
    } else {
      return redirect()->back()->with('error', 'Bạn cần đăng nhập tài khoản để yêu thích sản phẩm');
    }
  }

  public function detailLike($id)
  {
    if ($id) {
      $sanphams = DB::table('yeuthichs')->where('user_id', $id)->get('sanpham_id');
      $count = count($sanphams);
      $yeuthichs = [];
      for ($i = 0; $i < $count; $i++) {
        $sanpham = DB::table('sanphams')->where('idsp', $sanphams[$i]->sanpham_id)->get(['idsp', 'anh', 'mota', 'gia']);
        $yeuthichs[] = $sanpham[0];
      }
      return view('front.chitietyeuthich', ['yeuthichs' => $yeuthichs, 'title' => 'Danh sách sản phẩm yêu thích']);
    } else {
      return redirect()->back()->with('error', 'Xem luợt thích sản phẩm thất bại!');
    }
  }
  public function deleteLike($id)
  {
    if ($id) {
      DB::table('yeuthichs')->where('sanpham_id', $id)->where('user_id', Auth::user()->id)->delete();
      return redirect()->back()->with('success', 'Bỏ yêu thích sản phẩm thành công!');
    } else {
      return redirect()->back()->with('error', 'Bỏ yêu thích sản phẩm thất bại!');
    }
  }
}
