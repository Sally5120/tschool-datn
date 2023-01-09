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
                <strong>Đổi mật khẩu</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Đổi mật khẩu</h5>

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
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form method="POST"class="form-horizontal" action="{{ url('/update-mat-khau') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label class="col-sm-2 control-label">Tài khoản</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $admin->admin_account}}" name="taikhoan" readonly>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu mới</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" value="" name="matkhaumoi" required>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" value="" name="nhaplai" required>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nhập mật khẩu cũ</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" value="" name="matkhaucu" required>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button type="submit" name="doimatkhau" class="btn btn-primary">Đổi mật khẩu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
