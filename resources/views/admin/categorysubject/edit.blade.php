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
                <a href="{{ route('categorysubject.index') }}">Hiển thị</a>
            </li>
            <li class="active">
                <strong>Cập nhật</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cập nhật thông tin về môn học</h5>

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
              <form method="POST"class="form-horizontal" action="{{ route('categorysubject.update',[$danhmucmonhoc->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                        <label class="col-sm-2 control-label">Tên môn học</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $danhmucmonhoc->tenmonhoc}}" name="tenmonhoc" onkeyup="ChangeToSlug();" id="slug"  >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">

                            <input type="text" class="form-control" value="{{ $danhmucmonhoc->slug_monhoc }}" name="slug_monhoc" id="convert_slug" >

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mô tả danh mục môn học</label>
                        <div class="col-sm-8">

                            <textarea name="mota" id="ckeditor_monhoc" cols="30" rows="10" class="form-control" style="resize: none">{{ $danhmucmonhoc->mota }}</textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group"><label class="col-sm-2 control-label">Trạng thái</label>
                        <div class="col-sm-8">
                            <select class="form-control m-b" name="kichhoat">
                                @if($danhmucmonhoc->kichhoat==0)
                                <option selected value="0">Kích hoạt </option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option  value="0">Kích hoạt </option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                          </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

                            <button type="submit" name="suamonhoc" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
