@extends('../layout')


@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Tìm kiếm
            </div>




        </div>
      </div>
    </div>
  </section>
<section class="probootstrap-section">
    <h3 style="padding-left: 50px">Bạn tìm kiếm với từ khóa là: {{ $tukhoa }}</h3>
    <div class="container">
        <div class="row">
            @php
                $count=count($timkiem);
            @endphp
            @if ($count==0)

                <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                  <h2>Không tìm thấy với từ khóa bạn nhập </h2>

                </div>


   @else
   <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
      <h2>Toàn bộ khóa học tìm được</h2>

    </div>
  </div>


            @foreach ($timkiem as $key=>$item)

            <div class="col-md-6">
              <div class="probootstrap-service-2 probootstrap-animate">
                <div class="image">
                  <div class="image-bg">
                    <img src="{{ asset('public/uploads/khoahoc/'.$item->hinhanh) }}" alt="Free Bootstrap Template by uicookies.com">
                  </div>
                </div>
                <div class="text">
                  <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{ $item->lichkhaigiang }}</span>
                  <h3>{{ $item->tieude }}</h3>
                  <p>{!! $item->tomtat !!}</p>
                  <p><a href="{{ url('xem-khoa-hoc/'.$item->slug_post) }}" class="btn btn-primary">Xem thông tin</a> <span class="enrolled-count"></span></p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            <div style="text-align: center">
                {{$timkiem->links()}}
                </div>

    </div>
    </div>
  </section>

@endsection

@section('link')
@include('pages.linkdangky')
@endsection

