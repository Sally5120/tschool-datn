
<section class="probootstrap-section probootstrap-bg-white  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
          <h3>ĐỘI NGŨ GIẢNG VIÊN</h3>
          <p class="lead">Chuyên nghiệp, nhiệt tình và dày dặn kinh nghiệm</p>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
          @foreach ($giaovien as $key=>$value)
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
      </div>
    </div>
</section>
