
@extends('../layout')



@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb" style="padding-bottom: 50px">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Về Trung tâm luyện thi
            </div>
        </div>
      </div>
    </div>
  </section>
<section class="probootstrap-section">
    @foreach ($about as $key=>$item)
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="probootstrap-flex-block">
            <div class="probootstrap-text probootstrap-animate">
              <div class="text-uppercase probootstrap-uppercase">{{ $item->tieude }}</div>
              <p>{!! $item->tomtat !!}</p>
              <p>Vị trí</p>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.037603389335!2d105.7885698147323!3d21.071160285975452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aace2aef1b1d%3A0xc52c1e8400db9327!2zOGEsIDMzMyDEkC4gWHXDom4gxJDhu4luaCwgWHXDom4gxJDhu4luaCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1657472079000!5m2!1svi!2s" width="280" height="120" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="probootstrap-image probootstrap-animate">
                <img src="{{ asset('public/uploads/aboutus/'.$item->hinhanh) }}" alt="Free Bootstrap Template by uicookes.com" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</section>
>
    @foreach ($about as $key=>$item)
    <div class="container">
      <div class="col-md-10 col-md-push-1">
        {!! $item->thongtin !!}
      </div>
    </div>
    @endforeach

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
