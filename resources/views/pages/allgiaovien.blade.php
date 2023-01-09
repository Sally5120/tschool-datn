@extends('../layout')



@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center  probootstrap-animate">
            <div class="style-breadcrumb">
             <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Toàn bộ giáo viên
            </div>
        </div>
      </div>
    </div>
  </section>
<section class="probootstrap-section probootstrap-bg-white ">


      <!-- END row -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                  <h2>Toàn bộ giáo viên trung tâm</h2>
                  <p class="lead">Tâm huyết, nhiệt tình và dày dặn kinh nghiệm</p>
                </div>
              </div>
            <div class="row">
                @foreach ($giaovien as $key=>$value)
                <a href="{{ url('thong-tin-giao-vien/'.$value->slug_giaovien) }}">
                <div class="col-md-3 col-sm-6">
                  <div class="probootstrap-teacher text-center probootstrap-animate">
                    <figure class="media">
                      <img src="{{ asset('public/uploads/teachers/'.$value->hinhanh) }}" alt="" class="img-responsive">
                    </figure>
                    <div class="text">
                      <h3>{{ $value->tengiaovien }}</h3>
                      <p>{!! $value->tomtat !!}</p>
                    </div>
                  </div>
                </div>
              </a>
                @endforeach

            </div>
        </div>

      <div style="text-align: center">
{{$giaovien->links()}}
</div>
   
  </section>
@section('link')
@include('pages.linkdangky')
@endsection
  @endsection




