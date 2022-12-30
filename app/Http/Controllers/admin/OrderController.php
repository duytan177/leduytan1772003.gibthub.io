<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }
    public function index()
    {

        $title = 'Danh sách đơn hàng';
        $orders = DB::table('orders')->paginate(5);
        return view('admin.donhang.index', ['orders' => $orders, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        $userID = Auth::user()->id;
        $orders = DB::table('carts')->where('user_id', $userID)->get();
        $count = count($orders);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $total += $orders[$i]->gia * $orders[$i]->soluong;
        }
        $param = [
            'user_id' => $userID,
            'ten' => $request->ten,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sodienthoai,
            'ghichu' => $request->ghichu,
            'loinhuan' => ($total * 20) / 100,
            'doanhthu' => $total
        ];
        $detail = [];
        if (DB::table('orders')->insert($param)) {
            $detailOrders = DB::table('orders')->orderBy('id', 'desc')->first();
            for ($i = 0; $i < $count; $i++) {
                $idsp = $orders[$i]->sanpham_id;
                $sanphams = DB::table('sanphams')->get(['idsp', 'soluong']);
                $countsp = count($sanphams);
                for ($j = 0; $j < $countsp; $j++) {
                    if ($idsp == $sanphams[$j]->idsp && $sanphams[$j]->soluong >= $orders[$i]->soluong) {
                        $paramsp = [
                            'soluong' =>  $sanphams[$j]->soluong - $orders[$i]->soluong
                        ];
                        DB::table('sanphams')->where('idsp', $idsp)->update($paramsp);
                    }
                }
                $detail = [
                    'order_id' => $detailOrders->id,
                    'sanpham_id' => $orders[$i]->sanpham_id,
                    'mota' => $orders[$i]->mota,
                    'gia' => $orders[$i]->gia,
                    'color' => $orders[$i]->color,
                    'size' => $orders[$i]->size,
                    'soluong' => $orders[$i]->soluong,
                    'anh' => $orders[$i]->anh
                ];
                DB::table('detailorder')->insert($detail);
            }
            DB::table('carts')->where('user_id', $userID)->delete();
            return redirect()->route('home')->with('success', 'Đặt hàng thành công');
        } else {
            return redirect()->back()->with('error', 'Đặt hàng thất bại vui lòng kiểm tra lại !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailOrder = DB::table('detailOrder')->where('order_id', $id)->get();
        return view('admin.donhang.detail', ['detailOrder' => $detailOrder, 'id' => $id, 'title' => 'Chi tiết đơn hàng']);
    }

    public function printOrder($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $order = DB::table('orders')->where('id', $id)->get();
        $detailOrder = DB::table('detailorder')->where('order_id', $id)->get();
        $param = [
            'order' => $order,
            'detailOrder' => $detailOrder
        ];
        
        $pdf->loadView('orderPDF', $param);
    
        return $pdf->stream();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Chỉnh sữa danh sách đơn hàng';
        $orders = DB::table('orders')->where('id', $id)->get();
        return view('admin.donhang.edit', ['orders' => $orders, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ghichu = $request->ghichu;
        if ($ghichu == null) {
            $ghichu = '';
        }
        $param = [
            'ten' => $request->ten,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sodienthoai,
            'ghichu' => $ghichu,
            'loinhuan' => $request->loinhuan,
            'doanhthu' => $request->doanhthu,
            'trangthai' => $request->trangthai
        ];
        if (DB::table('orders')->where('id', $id)->update($param)) {
            return redirect()->route('adminorder.index')->with('success', 'cập nhập thành công');
        } else {
            return redirect()->route('adminorder.index')->with('error', 'cập nhập thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('detailorder')->where('order_id',$id)->delete();
        DB::table('orders')->where('id',$id)->delete();
        return redirect()->route('adminorder.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
