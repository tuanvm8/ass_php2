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

            <form role="form" action="{{URL::to('save-product/')}}" method="post">
                {{csrf_field()}}
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="tên sản phẩm">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">price</label>
                                <input type="number" name="price"  class="form-control" id="exampleInputPassword1" >
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" name="image">image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả ngắn</label>
                                    <textarea class="form-control"  name="short_desc"></textarea>
                                    @error('short_desc')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chi tiết</label>
                                    <input type="text" name="detail" class="form-control" id="detail" >
                                    @error('detail')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục</label>
                                    <select name="cate_id" id="" class = "form-control">
                                        @foreach($cate as $index)
                                            <option value="{{$index->id}}">{{$index->cate_name}}</option>
                                        @endforeach
                                    </select>

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

