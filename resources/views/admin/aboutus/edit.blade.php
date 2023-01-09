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
                <a href="{{ route('aboutus.index') }}">Hiển thị</a>
            </li>
            <li class="active">
                <strong>Cập nhật</strong>
            </li>
        </ol>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Cập nhật thông tin về Trung tâm luyện thi</h5>

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
                        <form method="POST" class="form-horizontal"
                            action="{{ route('aboutus.update',[$thongtin->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tiêu đề</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$thongtin->tieude }}" name="tieude"
                                        aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$thongtin->slug_thongtin }}"
                                        name="slug_thongtin" aria-describedby="emailHelp" id="convert_slug">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Tóm tắt thông tin</label>
                                <div class="col-sm-8">
                                    <textarea name="tomtat" id="ckeditor_tomtatthongtin" cols="30" rows="10"
                                        class="form-control" style="resize: none">{{ $thongtin->tomtat }}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Thông tin</label>
                                <div class="col-sm-8">
                                    <textarea name="thongtin" id="ckeditor_thongtin" cols="30" rows="10"
                                        class="form-control" style="resize: none">{{ $thongtin->thongtin }}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="hinhanh">
                                    <br>
                                    <img src="{{ asset('public/uploads/aboutus/'.$thongtin->hinhanh) }}"
                                        style="width:100px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" pattern="(\+84|0)\d{9,10}"
                                        value="{{$thongtin->sodienthoai }}" name="sodienthoai">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">URL Fanpage</label>
                                <div class="col-sm-8">
                                    <input type="url" class="form-control" value="{{$thongtin->url }}" name="url">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$thongtin->diachi }}"
                                        name="diachi">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" value="{{$thongtin->email }}" name="email">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Trạng thái</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="kichhoat">
                                        @if($thongtin->kichhoat==0)
                                        <option selected value="0">Kích hoạt </option>
                                        <option value="1">Không kích hoạt</option>
                                        @else
                                        <option value="0">Kích hoạt </option>
                                        <option selected value="1">Không kích hoạt</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">

                                    <button type="submit" name="suaabout" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection