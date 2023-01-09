@extends('admin.dashboard')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}">Home</a>
            </li>
            <li class="active">
                <strong>Học viên đã liên hệ</strong>
            </li>

        </ol>
    </div>

</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Học viên đã liên hệ</h5>

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
                    <th >Họ tên</th>
                    <th style="width:100px">Email</th>
                    <th >Số điện thoại</th>
                    <th >Khóa học quan tâm</th>
                    <th >Thời gian liên hệ tới học viên</th>
                    <th style="width:100px">Trạng thái</th>
                    <th  style="width:120px">Quản lý</th>
                  </tr>
                </thead>
                <tbody>


                        @foreach($thongtin as $key=>$values)
                        <tr class="gradeX">
                          <th scope="row">{{ $key +1 }}</th>
                          <td>{{ $values->hoten }}</td>

                          <td>{{ $values->email }}</td>

                          <td>{{ $values->sodienthoai }}</td>

                          <td>{{ $values->khoahocquantam}}</td>
                          <td>{{ $values->updated_at}}</td>



                          <td>
                              {{-- @if($values->kichhoat==0)
                                  <span class="text text-danger" >Chưa liên hệ</span>
                              @else
                                  <span class="text text-success">Đã liên hệ</span>
                              @endif --}}
                              <?php
                              if($values->trangthai==0){
                               ?>
                              <i class="fa fa-times-circle"></i> <a href="{{URL::to('/unactive-dangky/'.$values->id)}} " style="text-decoration: none"><span id="not_contacted">Chưa liên hệ</span></a>
                               <?php
                                }else{
                               ?>
                                <i class="fa fa-check-circle"></i> <a href="{{URL::to('/active-dangky/'.$values->id)}}" style="text-decoration: none"><span id="contacted">Đã liên hệ</span></a>
                               <?php
                              }
                             ?>
                          </td>
                          <td>
                              <form action="{{ route('contact.destroy',[$values->id]) }}" method="POST">
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
