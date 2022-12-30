<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('AdminRole');
        
    }
    public function index()
    {
        $users = DB::table('users')->get();
        $soluong = DB::table('users')->where('typeuser',2)->count();
        $title = 'Danh sách người dùng';
        
        return view('admin.nguoidung.index',['users' => $users,'soluong' => $soluong,'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nguoidung.add',['title' => 'Them người dùng']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = Hash::make($request->password);
   
        $param = [
            'name' => $request->ten,
            'email' => $request->email,
            'typeuser' => $request->typeuser,
            'password' => $password
        ];
        DB::table('users')->insert($param);
        return redirect()->route('adminuser.index')->with('success','Thên người dùng thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('users')->get();
        $title = 'Danh sách người dùng';
        return view('admin.nguoidung.index',['users' => $users,'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        $title = 'Sữa thông tin người dùng';
        return view('admin.nguoidung.edit',['user' => $user,'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if(Hash::needsRehash($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = $request->password;
        }
        $param = [
            'name' => $request->name,
            'typeuser' => $request->typeuser,
            'password' => $password
        ];
        DB::table('users')->where('id',$id)->update($param);
        return redirect()->route('adminuser.index')->with('success','Cập nhập thành công !');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('adminuser.index')->with('success','Xóa thành công !');
    }
}
