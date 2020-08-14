@extends('layouts.main')
@section('content')
    <table class="table">
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
            <th scope="col">cate_name</th>
            <th scope="col">Show_menu</th>

        </tr>
        </thead>
        @foreach($list as $key => $value)
        <tbody>
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->cate_name}}</td>
                <td>{{$value->show_menu}}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{URL::to('/edit/'.$value->id)}}">Sửa</a>
                    <a class="btn btn-danger btn-sm"href="{{URL::to('/delete-category/'.$value->id)}}">Xóa</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
