<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\SanPhamModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private $sanpham;
    private $product;
    public function __construct()
    {
        $this->sanpham = new SanPhamMoDel();
    }
    public function index()
    {
        $title = 'Danh sách giỏ hàng';
        $cart = "";
        $total = 0;
        $sanphams = DB::table('sanphams')->get();
        $count = count($sanphams);
        $colors = [];
        $sizes = [];
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $cart = DB::table('carts')->where('user_id', $userID)->get();
            $soluong = DB::table('carts')->where('user_id', $userID)->get('soluong');
            $gia = DB::table('carts')->where('user_id', $userID)->get('gia');
            $counts = count($cart);
            for ($i = 0; $i < $counts; $i++) {
                //Tính tống giá của sản phẩm
                $total += $gia[$i]->gia * $soluong[$i]->soluong;
                //Lấy ra cá màu của sản phẩm có trong giỏ hàng
                for ($j = 0; $j < $count; $j++) {
                    if ($sanphams[$j]->idsp == $cart[$i]->sanpham_id) {
                        $colors[$cart[$i]->id] = explode('|', $sanphams[$j]->color);
                    }
                }
                //lấy ra size của sảnh phẩm có trong giỏ hàng
                for ($j = 0; $j < $count; $j++) {
                    if ($sanphams[$j]->idsp == $cart[$i]->sanpham_id) {
                        $sizes[$cart[$i]->id] = explode('|', $sanphams[$j]->size);
                    }
                }
            }
        }
        return view('front.cart', ['cart' => $cart, 'colors' => $colors, 'sizes' => $sizes, 'total' =>  $total, 'title' => $title]);
    }
    public function addToCart($id)
    {
        $result = $this->sanpham->getSanPhamByID($id);
        $soluong = $result[0]->soluong;
        $color = explode('|', $result[0]->color);
        $size = explode('|', $result[0]->size);

        if (Auth::check()) {
            if ($soluong > 0) {
                $userID = Auth::user()->id;
                $cart = DB::table('carts')->where('sanpham_id', $id)->where('user_id', $userID)->where('color', $color)->where('size', $size)->get();
                if (empty($cart[0])) {
                    $param = [
                        'sanpham_id' => $id,
                        'user_id' => $userID,
                        'mota' => $result[0]->mota,
                        'gia' => $result[0]->gia,
                        'color' => $color[0],
                        'size' => $size[0],
                        'anh' => $result[0]->anh,
                        'soluong' => 1
                    ];
                    DB::table('carts')->insert($param);
                }
                for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$i]->color == $color[0]) {
                        $param = [
                            'soluong' => $cart[$i]->soluong + 1
                        ];
                        DB::table('carts')->where('sanpham_id', $id)->where('user_id', $userID)->where('color', $color)->where('size',$size)->update($param);
                    }
                }
                return redirect()->route('cart')->with('success', 'thêm vào giỏ hàng thành công');
            } else {
                return redirect()->route('cart')->with('error', 'Sản phẩm đã hết hàng !');
            }
        }
        return redirect()->route('cart')->with('error', 'Cần đăng nhập để thêm vào giỏ hàng');
    }


    public function updateCart(Request $request, $id)
    {
        $cart = DB::table('carts')->where('id', $id)->get();
        $sanpham = DB::table('sanphams')->where('idsp', $cart[0]->sanpham_id)->get(['color', 'size', 'soluong']);
        $slcart = $request->soluong;
        $slsanpham = $sanpham[0]->soluong;
        $colors = explode('|', $sanpham[0]->color);
        $sizes = explode('|', $sanpham[0]->size);
        if ($slsanpham - $slcart >= 0) {
            if ($id) {
                $param = [
                    'soluong' => $slcart,
                    'color' => $colors[$request->color],
                    'size' => $sizes[$request->size]
                ];
                DB::table('carts')->where('id', $id)->update($param);
                return redirect()->route('cart')->with('success', 'Cập nhập thành công');
            } else {
                return redirect()->back()->with('error', 'Cập nhập thất bại');
            }
        } else {
            return redirect()->back()->with('error', 'Số lượng vượt quá giới hạn số lượng sản phẩm . Vui lòng chọn lại số lượng');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            // $carts = session()->get(Auth::user()->name);
            //   unset($carts[$id]);
            //    session()->put(Auth::user()->name, $carts);
            //   $cart = session()->get(Auth::user()->name);
            //   $userID = Auth::user()->id;
            DB::table('carts')->where('id', $id)->delete();
            return redirect()->route('cart')->with('success', 'Xóa vào giỏ hàng thành công');
        }
        return redirect()->back()->with('error', 'Xóa giỏ hàng thật bại');
    }
}
