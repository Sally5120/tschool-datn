@extends('../layout')


@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/{{ $tenmonhoc }}
            </div>
        </div>
      </div>
    </div>
</section>
<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            @php
                $count=count($khoahoc);
            @endphp
            @if ($count==0)

                <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                  <h2>Khóa học đang cập nhật</h2>

                </div>


   @else
   <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
      <h2>Toàn bộ khóa học hiện có</h2>
      <p class="lead">Chương trình chuẩn theo kiến thức sách giáo khoa</p>
    </div>
  </div>


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
                  <p>{!! $item->tomtat !!}</p>
                  <p><i class="icon-calendar2"></i> Lịch khai giảng: {{ $item->lichkhaigiang }}</p>
                  <p><a href="{{ url('xem-khoa-hoc/'.$item->slug_post) }}" class="btn btn-primary">Xem thông tin</a> <span class="enrolled-count"></span></p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
  </section>
@section('link')
@include('pages.linkdangky')
@endsection
@endsection



