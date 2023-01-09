@extends('../layout')

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/<a class="breadcrumb1" href="{{ url('toan-bo-giao-vien/') }}">Giáo viên</a>/{{ $giaovien->tengiaovien }}
            </div>
        </div>
      </div>
    </div>
  </section>

<section class="probootstrap-section probootstrap-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row probootstrap-gutter0">
            <div class="col-md-4" id="probootstrap-sidebar">
              <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                <h3>{{  $giaovien->tengiaovien }}</h3>
                <ul class="probootstrap-side-menu">


                    <figure class="media">
                        <img src="{{ asset('public/uploads/teachers/'.$giaovien->hinhanh) }}" alt="" class="img-responsive">
                      </figure>
                    <li><a href="#">{!! $giaovien->tomtat !!}</a></li>

                </ul>
            </div>
              </div>
            </div>
            <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
              <h2>Đôi nét về giáo viên</h2>
              <p>{!!$giaovien->thongtin !!}</p>

            </div>
          </div>
        </div>
      </div>
      <br>

      <!-- END row -->


    </div>
    
  </section>
  <section class="probootstrap-section probootstrap-bg-white  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h3>GIÁO VIÊN KHÁC CỦA TSCHOL</h3>
          <p class="lead">Chuyên nghiệp, nhiệt tình và dày dặn kinh nghiệm</p>
        </div>
      </div>
      <!-- END row -->

      <div class="row">
          @foreach ($giaovienkhac as $key=>$value)
          <a href="{{ url('thong-tin-giao-vien/'.$value->slug_giaovien) }}">
          <div class="col-md-3 col-sm-6">
            <div class="probootstrap-teacher text-center probootstrap-animate">
              <figure class="media">
                <img src="{{ asset('public/uploads/teachers/'.$value->hinhanh) }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
              </figure>
              <div class="text">
                <h3>{{ $value->tengiaovien }}</h3>
                <p>{!! $value->tomtat !!}</p>
              </div>
            </div>
          </div>
        </a>
          @endforeach
          <div style="text-align: center">
            {{$giaovienkhac->links()}}
            </div>

      </div>

    </div>
  </section>
  @section('link')
@include('pages.linkdangky')
@endsection
@endsection





