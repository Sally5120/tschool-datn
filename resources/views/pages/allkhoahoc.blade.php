@extends('../layout')



@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Toàn bộ khóa học
            </div>
        </div>
      </div>
    </div>
  </section>

<section class="probootstrap-section probootstrap-bg-white ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Toàn bộ khóa học hiện có</h2>
          <p class="lead">Chương trình chuẩn theo kiến thức sách giáo khoa</p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
          @foreach ($khoahoc as $key=>$item)
          <div class="col-md-6">
            <div class="probootstrap-service-2 probootstrap-animate">
              <div class="image">
                <div class="image-bg">
                  <img src="{{ asset('public/uploads/khoahoc/'.$item->hinhanh) }}" alt="Free Bootstrap Template by uicookies.com">
                </div>
              </div>
              <div class="text">

                <h3>{{ $item->tieude }}</h3>
                <p>{!!substr( $item->tomtat,0,110) !!}...</p>
                <p><i class="icon-calendar2"></i> Lịch khai giảng: {{ $item->lichkhaigiang }}</p>
                <p><a href="{{ url('xem-khoa-hoc/'.$item->slug_post) }}" class="btn btn-primary">Xem thông tin</a> <span class="enrolled-count"></span></p>
            </div>
            </div>
          </div>
          @endforeach
          <div style="text-align: center">
            {{$khoahoc->links()}}
            </div>
      </div>
    </div>
 

  </section>

@section('teacher')
@include('pages.teacher')
@endsection
@section('link')
@include('pages.linkdangky')
@endsection
  @endsection


