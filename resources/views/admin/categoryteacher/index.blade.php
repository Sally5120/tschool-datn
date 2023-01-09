@extends('admin.dashboard')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}">Trang chủ</a>
            </li>
            <li class="active">
                <strong>Hiển thị</strong>
            </li>

        </ol>
    </div>

</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liệt kê thông tin giáo viên</h5>

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
            <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                  <tr >
                    <th style="width:50px">STT</th>
                    <th style=" word-wrap:normal" >Tên giáo viên</th>
                    {{-- <th >Thuộc môn học</th> --}}
                    <th >Hình ảnh</th>
                    <th style=" word-wrap:normal">Tóm tắt thông tin</th>
                    <th style=" word-wrap:normal">Thông tin</th>
                    <th style="width:100px">Trạng thái</th>
                    <th  style="width:120px">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($giaovienmonhoc as $key=>$giaovien)
                    <tr class="gradeX">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $giaovien->tengiaovien }}</td>
                            {{-- <td>{{ $giaovien->monhoc->tenmonhoc }}</td> --}}
                            <td><img src="{{ asset('public/uploads/teachers/'.$giaovien->hinhanh) }}" style="width:100px;height:150px" alt=""></td>
                            
                            <td>{!! $giaovien->tomtat !!}</td>
                            <td>{!! $giaovien->thongtin !!}</td>

                            <td>
                                @if($giaovien->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categoryteacher.edit',[$giaovien->id]) }}" class="btn btn-warning" style="margin-bottom:5px">Chỉnh sửa</a>

                                <form action="{{ route('categoryteacher.destroy',[$giaovien->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có thật sự muốn xóa không?');" class="btn btn-danger" id="delete_teacher">Xóa</button>
                                </form>
                            </td>

                         @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
</div></div>
@endsection
