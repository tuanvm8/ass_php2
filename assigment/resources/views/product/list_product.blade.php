@extends('layouts.main')
@section('content')
    <section class="content">
    <table class="table table-bordered table-hover">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text_alert">'.$message.'<span>';
            Session::put('message',null);
        }
        ?>
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">image</th>
            <th scope="col">cate_name</th>
            <th scope="col">price</th>
            <th scope="col">short_desc</th>
            <th scope="col">detail</th>

            <th></th>




        </tr>
        </thead>
            <h1>có {{count($list)}} sản phẩm</h1>
        @foreach($list as $key=>$value)
            <tbody>

            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td><img src="{{asset($value->image)}}" alt="" style="width: 100px"></td>
                <td>{{$value->cate_name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->short_desc}}</td>
                <td>{{$value->detail}}</td>
                <td>{{$value->star}}</td>



                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{URL::to('edit-product/'.$value->id)}}">Sửa</a>
                    <a class="btn btn-danger btn-sm"href="{{URL::to('/delete-product/'.$value->id)}}">Xóa</a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    </section>
@endsection
