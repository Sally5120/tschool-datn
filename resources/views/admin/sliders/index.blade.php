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
                <h5>Liệt kê ảnh slide</h5>

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
                    <th >Tên Slider</th>
                    <th >Hình ảnh</th>
                    
                    <th >Mô tả</th>
                    <th style="width:100px">Trạng thái</th>
                    <th  style="width:120px">Quản lý</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach($slider as $key=>$values)
                    <tr class="gradeX">
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $values->slider_name}}</td>
                            <td><img src="{{ asset('public/uploads/Slider/'.$values->slider_image) }}" style="width:200px;height:100px" alt=""></td>
                           
                            <td>{!! $values->slider_desc !!}</td>



                            <td>
                                @if($values->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sliders.edit',[$values->id]) }}" class="btn btn-warning" style="margin-bottom:5px">Chỉnh sửa</a>

                                <form action="{{ route('sliders.destroy',[$values->id]) }}" method="POST">
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
