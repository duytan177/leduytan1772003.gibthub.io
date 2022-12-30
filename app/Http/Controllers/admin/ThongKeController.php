<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{

   public function __construct()
   {
      $this->middleware('AdminRole');
   }
   public function index()
   {
      //  $sql = "select * from view_doanhthu";
      //  $quantity = DB::select($sql);

      // return view('admin.thongke',[
      //   'quantity'=> $quantity,
      //   'title'=>'Thống kê doanh thu của hàng theo tháng.'
      // ]);

      $MONTHS  = ['1', '2', '3', '4', '5','6', '7', '8','9', '10', '11', '12'];
         $total = [0,0,0,0,0,0,0,0,0,0,0,0];
         $config = [0,0,0,0,0,0,0,0,0,0,0,0];
      $months = DB::table('view_doanhthu')->get();
      foreach ($months as $i =>  $item) {
         foreach ($MONTHS as $id => $value) {
            if ($item->thang == $value) {
               $total[$id] = $item->tongdoanhthu;
               $config[$id] = $item->loinhuan;
   
            }
            
         }
      }
      return view('admin.thongke',[
         'months' => json_encode($MONTHS),
         'total' => json_encode($total),
         'config' => json_encode($config),
         'title'=>'Thống kê doanh thu của hàng theo tháng.'
      ]);
   }
   public function like(){
      $sanpham = [];
      $luotthich = [];
      $color = [];
      $result = DB::table('view_luotthich')->get();
      foreach($result as $id => $item){
         $luotthich[$id] = $item->luotthich;
         $result = DB::table('sanphams')->where('idsp',$item->sanpham_id)->first();
         $sanpham[$id] = $result->masp;
         $color[$id] = '#'.str_pad(dechex(mt_rand()),6,'0',STR_PAD_LEFT);
      }
      return view('admin.thongkelike',[
         'sanpham' => json_encode($sanpham),
         'luotthich' => json_encode($luotthich),
         'color' => json_encode($color),
         'title'=>'Thống kê lượt thích của sản phẩm.'
      ]);
   }
}
