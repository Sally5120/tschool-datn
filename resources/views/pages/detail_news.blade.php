@extends('../layout')

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/<a class="breadcrumb1" href="{{ url('toan-bo-tin-tuc/') }}">Tin tức</a>/{{ $details_news->tieude }}
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

            <h2>{{ $details_news->tieude }}</h2>
<p>            <i class="icon-calendar"></i> Thời gian đăng: {{ $details_news->created_at->format('d-m-Y') }} ({{ $details_news->created_at->diffForHumans() }})
    </p>

 <p>{!!$details_news->noidung!!}</p>


          </div>
        </div>
      </div>
    </div>
</section>
@section('link')
@include('pages.linkdangky')
@endsection
@endsection



