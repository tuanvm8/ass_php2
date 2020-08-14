@extends('layouts.main')
@section('style')
    {{!! asset('localhost/assigment/public/')}}
@section('content')


        @foreach( $edit_category as $key=>$edit)
        <form role="form" action="{{URL::to('update-category/'.$edit->id)}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputDescription">tên danh mục</label>
                            <input type="text" name="cate_name"  value="{{$edit->cate_name}}" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">mo tả</label>
                            <input type="text" name="show_menu"  value="{{$edit->show_menu}}" class="form-control">

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <button type="submit" name="" class="btn btn-primary" >Cập Nhật</button>

    </form>
        @endforeach
@endsection
