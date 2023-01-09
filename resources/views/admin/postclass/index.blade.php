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
                <h5>Liệt kê khóa học</h5>

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
                    <th >Tên khóa học</th>
                    
                    <th scope="col">Thuộc môn học</th>
                    <th scope="col">Giáo viên</th>
                    <th scope="col">Số lượng học viên</th>

                    <th >Hình ảnh</th>

                    <th scope="col">Lịch khai giảng</th>
                    <th style="width:100px">Trạng thái</th>
                    <th  style="width:120px">Quản lý</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach($khoahoc as $key=>$khoa)
                    <tr class="gradeX">
                            <th scope="row">{{ $key+1}}</th>
                            <td>{{ $khoa->tieude }}</td>
                     
                            <td>{{ $khoa->monhoc->tenmonhoc }}</td>
                            <td>{{ $khoa->giaovien->tengiaovien }}</td>
                            <td>{{ $khoa->Soluonghocvien }}</td>
                            <td><img src="{{ asset('public/uploads/khoahoc/'.$khoa->hinhanh) }}" style="width:100px;height:100px" alt=""></td>
                            <td>{{ $khoa->lichkhaigiang}}</td>
                            <td>
                                @if($khoa->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('postclass.edit',[$khoa->id]) }}" class="btn btn-warning" style="margin-bottom:5px">Chỉnh sửa</a>

                                <form action="{{ route('postclass.destroy',[$khoa->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có thật sự muốn xóa không?');" class="btn btn-danger">Xóa</button>
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
