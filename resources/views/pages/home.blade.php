@extends('../layout')
@section('slide')
@include('pages.slider')
@endsection


@section('content')


<section class="probootstrap-section" id="probootstrap-counter">
    <div class="container">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-users2"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="{{ $demhocsinhdangky }}" data-speed="5000" data-refresh-interval="50">1</span>
              </span>
              <span class="probootstrap-counter-label">Học sinh đã đăng ký</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-user-tie"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="{{ $demgiaovien }}" data-speed="5000" data-refresh-interval="50">1</span>
              </span>
              <span class="probootstrap-counter-label">Số lượng giáo viên</span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block visible-xs-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
          <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-library"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="99" data-speed="5000" data-refresh-interval="50">1</span>%
              </span>
              <span class="probootstrap-counter-label">Tỉ lệ đỗ các trường đại học</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">

           <div class="probootstrap-counter-wrap">
            <div class="probootstrap-icon">
              <i class="icon-smile2"></i>
            </div>
            <div class="probootstrap-text">
              <span class="probootstrap-counter">
                <span class="js-counter" data-from="0" data-to="100" data-speed="5000" data-refresh-interval="50">1</span>%
              </span>
              <span class="probootstrap-counter-label">Sự hài lòng phụ huynh</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{ asset('public/frontend/img/slider_2.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate">
          <h2 class="mb0">Nổi bật</h2>
        </div>
      </div>
    </div>
    <div class="probootstrap-tab-style-1">
      <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
        <li class="active"><a data-toggle="tab" href="#featured-news">Khóa học mới</a></li>
        <li><a data-toggle="tab" href="#upcoming-events">Tin tức mới</a></li>
      </ul>
    </div>
  </section>

  <section class="probootstrap-section probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="tab-content">

            <div id="featured-news" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-12">
                  <div class="owl-carousel" id="owl1">
                    @foreach ($khoahoc as $key=>$item)
                    <div class="item">
                      <a href="{{ url('xem-khoa-hoc/'.$item->slug_post) }}" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="{{ asset('public/uploads/khoahoc/'.$item->hinhanh) }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>{{ $item->tieude }}</h3>
                          <p>{!!substr( $item->tomtat,0,110) !!}...</p>
                          <p><i class="icon-calendar2"></i> Lịch khai giảng: {{ $item->lichkhaigiang }}</p>


                        </div>
                      </a>
                    </div>
                    @endforeach
                    <!-- END item -->

                    <!-- END item -->
                  </div>
                </div>
              </div>
              <!-- END row -->
            </div>
            <div id="upcoming-events" class="tab-pane fade">
              <div class="row">
                <div class="col-md-12">
                  <div class="owl-carousel" id="owl2">
                    @foreach ($news as $key=>$item)
                    <div class="item">
                        <a href="{{ url('doc-tin-tuc/'.$item->slug_tintuc) }}" class="probootstrap-featured-news-box">
                          <figure class="probootstrap-media"><img src="{{ asset('public/uploads/news/'.$item->hinhanh) }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                          <div class="probootstrap-text">
                            <h3>{{$item->tieude }}</h3>
                            <p>{!!substr( $item->tomtat,0,110) !!}...</p>
                            <span class="probootstrap-date"><i class="icon-calendar"></i>Thời gian đăng: {{ $item->updated_at->diffForHumans() }}</span>
                          </div>
                        </a>
                      </div>
                    @endforeach
                    <!-- END item -->
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h2>Khóa học gợi ý</h2>
          <p class="lead">Chương trình chuẩn theo kiến thức sách giáo khoa</p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
          @foreach ($khoahocgoiy as $key=>$item)
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
                <p><i class="icon-calendar2"></i>Lịch khai giảng: {{ $item->lichkhaigiang }}</p>
                <p><a href="{{ url('xem-khoa-hoc/'.$item->slug_post) }}" class="btn btn-primary">Xem thông tin</a> <span class="enrolled-count"></span></p>
            </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </section>
@section('teacher')
@include('pages.teacher')
@endsection
@section('whychoose')
@include('pages.whychoose')
@endsection
@section('link')
@include('pages.linkdangky')
@endsection
@endsection

