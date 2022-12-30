<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminRole');
    }

    public function index()
    {
        
        $dssp = DB::table('sanphams')->paginate(5);
        return view('admin.sanpham.index',[
            'dssp'=>$dssp,
            'title'=>'Danh sách sản phẩm'
        ]);
            // $result = DB::table('sanphams')->get();
            // return view('home',['result' => $result]);
    }

    public function create()
    {
     
        $dmsps = DB::table('danhmucsanphams')->get();
        return view('admin.sanpham.add',[
            'dmsps'=>$dmsps,
            'title'=>'Thêm sản phẩm'
        ]);
    }

    public function store(SanPhamRequest $request)
    {
        $des = "public/images/";
        $imgname = $des.$request->file('anh')->getClientOriginalName();
        try{
            $params = [
                'iddm' => $request->iddm,
                'masp' => $request->masp,
                'tensp' => $request->tensp,
                'mota' => $request->mota,
                'color' => $request->color,
                'size' => $request->size,
                'gia' => floatval($request->gia),
                'soluong' => $request->soluong,
                'anh' => $imgname
            ];
            DB::table('sanphams')->insert($params);
            $request->file('anh')->move($des,$imgname);
            return redirect()->route('adminpro.index')->with('success','Thêm sản phẩm thành công');
        }catch(Exception $e){
            /*
            Session::flash('error', $e->getMessage());
            return redirect()->back();
            */
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($idsp)
    {
    
        try{
            $dmsps = DB::table('danhmucsanphams')->get();
            $sp = DB::table('sanphams')->where('idsp',$idsp)->first();
            return view('admin.sanpham.edit',[
                'sp'=>$sp,'dmsps'=>$dmsps,
                'title'=>'Sửa thông tin sản phẩm'
            ]);
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function update(SanPhamRequest $request, $idsp)
    {
  
        $des = 'public/images/';
        if($request->hasFile('anh'))
          $imgname = $des.$request->file('anh')->getClientOriginalName();
          
        try{
            $params = [
                'iddm' => $request->iddm,
                'masp' => $request->masp,
                'tensp' => $request->tensp,
                'color' => $request->color,
                'size' => $request->size,
                'soluong' => $request->soluong,
                'gia' => floatval($request->gia),
                'anh' => $request->hasFile('anh')?$imgname:$request->img,
                'mota' => $request->mota
            ];
            
            DB::table('sanphams')->where('idsp',$idsp)->update($params);
            if($request->hasFile('anh'))
               $request->file('anh')->move($des,$imgname);
            return redirect()->route('adminpro.index')->with('success','Sửa sản phẩm thành công');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function destroy($idsp)
    {
        try{
            DB::table('sanphams')->where('idsp',$idsp)->delete();
            return redirect()->route('adminpro.index')->with('success','Xóa sản phẩm thành công');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
