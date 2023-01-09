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
                <a href="{{ route('postclass.index') }}">Hiển thị</a>
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
                <h5>Thêm khóa học</h5>

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
            <form method="POST"class="form-horizontal"  action="{{ route('postclass.update',[$khoahoc->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                        <label class="col-sm-2 control-label">Tiêu đề khóa học</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $khoahoc->tieude }}" name="tieude"  onkeyup="ChangeToSlug();" id="slug" >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $khoahoc->slug_post }}" name="slug_post"  id="convert_slug">

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Tóm tắt khóa học</label>
                        <div class="col-sm-8">
                            <textarea name="tomtat" id="ckeditor_shortdesc" cols="30" rows="10" class="form-control" style="resize: none">{{ $khoahoc->tomtat }}</textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nội dung khóa học</label>
                        <div class="col-sm-8">
                            <textarea name="noidung" id="ckeditor_noidung" cols="30" rows="10" class="form-control" style="resize: none">{{ $khoahoc->noidung }}</textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Số lượng học viên</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="Soluonghocvien" value="{{ $khoahoc->Soluonghocvien }}">
                            </div>
                        </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="hinhanh">
                            <br>
                            <img src="{{ asset('public/uploads/khoahoc/'.$khoahoc->hinhanh) }}" style="width:100px;height:150px" alt="" id="image_post">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Môn học</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="id_monhoc">
                                    @foreach ($monhoc as $key=>$values)
                                    <option {{ $khoahoc->id_monhoc==$values->id ?'selected':'' }} value="{{ $values->id }}">{{ $values->tenmonhoc }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Giáo viên</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="id_giaovien">
                                        @foreach ($giaovien as $key=>$values)
                            <option {{ $khoahoc->id_giaovien==$values->id ?'selected':'' }} value="{{ $values->id }}">{{ $values->tengiaovien }}</option>
                            @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Lịch khai giảng</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{ $khoahoc->lichkhaigiang }}" name="lichkhaigiang" >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Trạng thái</label>
                                    <div class="col-sm-8">
                                        <select class="form-control m-b" name="kichhoat">
                                            @if($khoahoc->kichhoat==0)
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

                            <button type="submit" name="suakhoahoc" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
