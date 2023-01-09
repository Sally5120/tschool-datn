@extends('admin.dashboard')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}">Trang chủ</a>
            </li>
            <li>
                <a href="{{ route('news.index') }}">Hiển thị</a>
            </li>
            <li class="active">
                <strong>Cập nhật thông tin</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cập nhật thông tin</h5>

            </div>
            <div class="ibox-content">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
              <form method="POST"class="form-horizontal" action="{{ url('/cap-nhat-thong-tin') }}" enctype="multipart/form-data">
        
                @csrf
                <div class="form-group">
                        <label class="col-sm-2 control-label">Tên người dùng</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$admin->admin_name }}" name="admin_name"   >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$admin->admin_address }}" name="admin_address"   >

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$admin->admin_email }}" name="admin_email"   >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$admin->admin_phone }}" name="admin_phone"   >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="admin_image">
                            <br>
                            <img src="{{ asset('public/uploads/admin/'.$admin->admin_image) }}" style="width:100px;height:150px" alt="">

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
