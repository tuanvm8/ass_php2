@extends('layouts.main')
@section('content')
    <section class="content">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text_alert">'.$message.'<span>';
            Session::put('message',null);
        }
        ?>

        <form role="form" action="{{URL::to('save-category')}}" method="POST">
            {{csrf_field()}}
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="cate_name" class="form-control" id="exampleInputEmail1" placeholder="tên danh mục">
                            @error('cate_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <input type="number" name="show_menu" class="form-control" id="exampleInputPassword11" placeholder="mô tả">
                            @error('show_menu')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
    </section>
@endsection

