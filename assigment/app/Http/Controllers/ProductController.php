<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Session;
use Auth;
session_start();

class ProductController extends Controller
{
    public function list_product()
    {
        $list = DB::table('products')
            ->join('categories', 'products.cate_id', 'categories.id')
            ->select('products.*', 'categories.cate_name')
            ->get();
    //dd($list);
//        $count = DB::table('products')->count();
//        dd($count);

        return view('product.list_product', compact('list'));

    }

    public function add_product()
    {
        $cate = DB::table('categories')->get();
        return view('product.add_product', compact('cate'));
    }
    public function save_product(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'price'=>'required',
                'short_desc'=>'required',
                'detail'=>'required'
            ],
            [
                'name'=>'không được để trống',
                 'price'=>'không đươc để trống',
                'short_desc'=>'không đươc để trống',
                'detail'=>'không đươc để trống'
            ]
        );
        $data = array();
        $data['id'] =  $request->id;
        $data['name'] =  $request->name;
        $data['cate_id'] =  $request->cate_id;
        $data['price'] =  $request->price;
        $data['short_desc'] =  $request->short_desc;
        $data['detail'] =  $request->detail;
        $imagee=$request->file('image');
        if($imagee){
            $get_name_image=$imagee->getClientOriginalName();

            $new_image =$get_name_image .rand(0,99).'.'.$imagee->getClientOriginalExtension();
            $imagee->move('upload/',$new_image);
            $data['image']=$new_image;
            DB::table('products')->insert($data);
            Session::put('message','thên danh mục thành công');
            return Redirect::to('list_product');
        }


        DB::table('products')->insert($data);
        Session::put('message','thên danh mục thành công');
        return Redirect::to('list_product');
    }


    public function delete_product($id){
        DB::table('products')->where('id',$id)->delete();
        Session::put('message',' Xóa thành công');
        return Redirect::to('list_product');
    }

    public function edit_product($id){
//        $edit_product = DB::table('products')->where('id',$id)->get();
//        $manager_product= view('product.edit_product')->with('edit_product',$edit_product);
//        return view('product.edit_product\',$manager_product')
//            ->with('product.edit_product',$manager_product);

        $category= DB::table('categories')->get();
        $product=DB::table('products')->find($id);
//        dd($product);
        return view('product.edit_product')
                ->with([
                    'category'=>$category,
                    'product'=>$product]);


    }
    public function update_product(Request $request,$id){
//        dd($request->all());
        $data = array();
        $data['name'] =  $request->name;
        $data['cate_id'] =  $request->cate_id;

        $file = $request->image;//null
        if ($file!=null){
            $file->move('upload', $file->getClientOriginalName());
            $data['image'] = 'upload/'.$file->getClientOriginalName();
        }

        $data['price'] =  $request->price;
        $data['short_desc'] =  $request->short_desc;
        $data['detail'] =  $request->detail;
        DB::table('products')->where('id',$id)->update($data);
        Session::put('message',' Sửa thành công');
        return Redirect::to('list_product');
    }



public function index(){
        $category=DB::table('categories')->get();
        //chưa tạo ý, hnay ms có dg link thoi
//    $product = DB::table('products')->count(); lấy ra số lượng
        $product=DB::table('products')->limit(8)->orderBy('id', 'DESC')->get();
        return view('web.index',compact('product','category'));
}

public function getlogin(){
        return view('login.index');
}

public function postlogin(Request $request){
    $credentials = $request->only('email', 'password');
    //        dd($credentials);
    if (Auth::attempt($credentials)) {
        // Authentication passed...
//         dd('thanhcong');
        return redirect('main');
    }
    dd('sai tài khoản mật khẩu');
    }

    public function details($id){

        return view('web.details');
    }


 public function detailss($id){
        $deta=DB::table('products')->where('id', $id)->first();

        return view('web.details',compact('deta'));
}


public function listds(){
        $count= DB::table('products')->count();

        $pr=DB::table('categories')->count();
    $user=DB::table('users')->count();
//    dd($user);
        return view('category.eee',compact('count','pr','user'));
}
}

