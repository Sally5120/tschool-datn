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
                <strong>Thông tin cá nhân</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thông tin cá nhân</h5>
                </div>
                <div>
                    <div class="ibox-content">
                        <img alt="image" class="img-responsive" style="text-center" src="{{ asset('public/uploads/admin/'.$admin->admin_image) }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong><i class="fa fa-user"></i> {{ $admin->admin_name }}</strong></h4>
                        <p><i class="fa fa-phone"></i> Số điện thoại: {{ $admin->admin_phone }}</p>
                        <p><i class="fa fa-envelope"></i> Email: {{ $admin->admin_email }}</p>
                        <p><i class="fa fa-map-marker"></i> Địa chỉ: {{ $admin->admin_address}}</p>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-4">

                                    <a href="{{ url('/thay-doi-thong-tin') }}" class="btn btn-primary btn-sm btn-block" >Thay đổi thông tin</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            </div>
</div>
</div>
@endsection
