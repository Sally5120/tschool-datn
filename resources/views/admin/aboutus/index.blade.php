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
                <h5>Liệt kê thông tin về Trung tâm luyện thi</h5>

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
                    <th >Tiêu đề</th>
                    <th >Hình ảnh</th>
                    <th >Địa chỉ</th>
                    <th >Số điện thoại</th>
                    <th >Email</th>
                    <th >URL Fanpage</th>
                    <th >Thông tin</th>
                    <th style="width:100px">Trạng thái</th>
                    <th  style="width:120px">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($thongtin as $key=>$values)
                  <tr class="gradeX">
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $values->tieude}}</td>
                    <td><img src="{{ asset('public/uploads/aboutus/'.$values->hinhanh) }}" style="width:200px;height:100px" alt=""></td>
                    <td>{{ $values->diachi }}</td>
                    <td>{{ $values->sodienthoai }}</td>
                    <td>{{ $values->email }}</td>
                    <td>{{ $values->url }}</td>
                    <td>{!!$values->tomtat !!}</td>
                    <td>
                        @if($values->kichhoat==0)
                            <span class="text text-success">Kích hoạt</span>
                        @else
                            <span class="text text-danger">Không kích hoạt</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('aboutus.edit',[$values->id]) }}" class="btn btn-warning" style="margin-bottom:5px">Chỉnh sửa</a>

                        
                    </td>

                 @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
</div></div>
@endsection
