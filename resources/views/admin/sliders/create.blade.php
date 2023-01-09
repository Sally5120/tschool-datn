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
                <a href="{{ route('sliders.index') }}">Hiển thị</a>
            </li>
            <li class="active">
                <strong>Thêm</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thêm ảnh slide</h5>

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
              <form method="POST"class="form-horizontal"  action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label class="col-sm-2 control-label">Tên slide</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ old('slider_name') }}" name="slider_name"  onkeyup="ChangeToSlug();" id="slug" >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ old('slug_slider') }}" name="slug_slider"  id="convert_slug">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mô tả slide</label>
                        <div class="col-sm-8">
                            <textarea name="slider_desc" id="ckeditor_slider" cols="30" rows="10" class="form-control" style="resize: none"></textarea>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="slider_image">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Trạng thái</label>
                        <div class="col-sm-8">
                            <select class="form-control m-b" name="kichhoat">
                                <option value="0">Kích hoạt </option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                          </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button type="submit" name="themslider" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
