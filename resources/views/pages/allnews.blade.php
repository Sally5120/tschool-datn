
@extends('../layout')



@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Tin tức nổi bật
            </div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
  <div class="row">
      @foreach ($allnews as $key=>$item)
      <div class="col-md-4  probootstrap-animate">
        <a href="{{ url('doc-tin-tuc/'.$item->slug_tintuc) }}" class="probootstrap-featured-news-box">
          <figure class="probootstrap-media"><img src="{{  asset('public/uploads/news/'.$item->hinhanh)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
          <div class="probootstrap-text">
            <h3>{{ $item->tieude }}</h3>
            <p>{!!substr( $item->tomtat,0,110) !!}...</p>
            <span class="probootstrap-date"><i class="icon-calendar"></i>Thời gian đăng: {{ $item->updated_at->diffForHumans() }}</span>
          </div>
        </a>
      </div>
      @endforeach
      <div style="text-align: center">
        {{$allnews->links()}}
        </div>
</div>
    </div>
</section>
@section('link')
@include('pages.linkdangky')
@endsection
    @endsection


