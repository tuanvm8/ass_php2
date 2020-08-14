<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();
class CategoryController extends Controller
{
    public function listt()
    {
        $list = DB::table('categories')->get();
        return view('category.list', compact('list'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function save_category(Request $request){
        $request->validate(
            [
                'cate_name'=>'required',
                'show_menu'=>'required'
            ],
            [
                'cate_name'=>'không được để trống',
                'cate_name.unique'=>'tên danh mục đã tồn tại',
                'show_menu'=>'không đươc để trống'
            ]
        );
        $data = array();
        $data['id'] =  $request->id;
        $data['cate_name'] =  $request->cate_name;
        $data['show_menu'] =  $request->show_menu;
        DB::table('categories')->insert($data);
        Session::put('message','thên danh mục thành công');
        return Redirect::to('list');
    }

    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        Session::put('message',' Xóa thành công');
        return Redirect::to('list');
    }

    public function edit_category($id){

        $edit_category = DB::table('categories')->where('id',$id)->get();
        $manager_category = view('category.edit')->with('edit_category',$edit_category);
        return view('layouts.main')->with('category.edit',$manager_category);
    }
    public function update_category(Request $request,$id){

        $data = array();
        $data['cate_name'] = $request->cate_name;
        $data['show_menu'] = $request->show_menu;
        DB::table('categories')->where('id',$id)->update($data);
        Session::put('message',' Sửa thành công');
        return Redirect::to('list');
    }


}
