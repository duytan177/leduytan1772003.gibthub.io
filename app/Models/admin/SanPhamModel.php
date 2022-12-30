<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPhamModel extends Model
{
    use HasFactory;

    public function getAll(){
        return DB::table('sanphams')->paginate(8);
    }

    public function getSanPham($filter =[],$orderby, $type){
       $result = DB::table('sanphams');
       if(!empty($filter)){
           $result = $result->where($filter);
        }
        $result = $result->orderBy($orderby,$type);

       $result = $result;
       return $result;
    }

    public function getSanPhamByID($id){
        return DB::table('sanphams')->where('idsp','=',$id)->get();
    }

   
}
