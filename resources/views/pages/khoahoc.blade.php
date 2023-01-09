@extends('../layout')

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/<a class="breadcrumb1" href="{{ url('danh-muc-mon-hoc/'.$khoahoc->monhoc->slug_monhoc) }}">{{ $khoahoc->monhoc->tenmonhoc }}</a>/{{ $khoahoc->tieude }}
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
                    <h3>Thông tin khóa học</h3>
                    <ul class="probootstrap-side-menu">


                        <figure class="media">
                            <img src="{{ asset('public/uploads/teachers/'.$khoahoc->giaovien->hinhanh) }}" alt="" class="img-responsive">
                        </figure>

                         <li><a href="{{ url('danh-muc-mon-hoc/'.$khoahoc->monhoc->slug_monhoc) }}">Danh mục: {!! $khoahoc->monhoc->tenmonhoc !!}</a></li>
                        <li><a href="{{ url('thong-tin-giao-vien/'.$khoahoc->giaovien->slug_giaovien) }}">Giáo viên: {!! $khoahoc->giaovien->tengiaovien !!}</a></li>


                        <li><i class="icon-calendar2"></i><a href="#"> Lịch khai giảng: {{ $khoahoc->lichkhaigiang }}</a></li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                <p>{!! $khoahoc->tomtat !!}</p>
              <h2>Nội dung khóa học</h2>
              <p>{!!$khoahoc->noidung!!}</p>
              <p><a href="{{ url('lien-he/') }}" class="btn btn-primary">Đăng ký ngay</a></p>
              <div class="fb-like" data-href="{{ \URL::current() }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
              <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="" data-numposts="5"></div>
            </div>
          </div>
        </div>



      </div>
    </div>

</section>
      <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h3>Khóa học gợi ý</h3>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
        @foreach ($cungdanhmuc as $key=>$item)
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
        <div style="text-align: center">
            {{$cungdanhmuc->links()}}
            </div>
    </div>
        </div>

  </section>
@endsection
@section('link')
@include('pages.linkdangky')
@endsection


