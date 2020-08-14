<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function main(){
        return view('layouts.main');
    }

    public function view($id){
        $model= DB::table('products')->where('cate_id',$id)->get();
        $cte=DB::table('categories')->get();
        return view('web.product',compact('model','cte'));

    }
}
