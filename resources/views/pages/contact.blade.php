

@extends('../layout')



@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate">
            <div class="style-breadcrumb">
                <a class="breadcrumb1" href="{{ url('/') }}">Trang Chủ</a>/Liên hệ
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
                <h3>Trung tâm luyện thi</h3>
                <ul class="probootstrap-side-menu">

                    <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                    <li><a href="{{ url('toan-bo-khoa-hoc/') }}">Khóa Học</a></li>
                    <li><a href="{{ url('toan-bo-giao-vien/') }}">Giáo Viên</a></li>
                    <li><a href="{{ url('toan-bo-tin-tuc/') }}">Tin Tức</a></li>
                    <li class="active"><a href="{{ url('lien-he/') }}">Liên Hệ</a></li>

                </ul>
              </div>
            </div>
            <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
              <h2>Liên hệ với chúng tôi</h2>
              <p>Vui lòng điền thông tin của bạn để nhận thông tin tư vấn</p>
              <form action="{{ url('dang-ky/') }} " method="post" class="probootstrap-form">

                @csrf

                <div class="form-group">
                  <label for="name">Họ tên</label>
                  <input type="text" class="form-control" id="name" name="hoten" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="email">Số điện thoại</label>
                    <input type="text" pattern="(\+84|0)\d{9,10}" class="form-control" id="phone" name="sodienthoai" title="Vui lòng nhập đúng định dạng VD:0986845888 hoặc +84888855555 " required>
                  </div>
                <div class="form-group">
                  <label for="subject">Khóa học bạn quan tâm</label>
                  <textarea cols="30" rows="10" class="form-control" id="message" name="khoahocquantam" required></textarea>

                </div>
              <br>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Gửi đăng ký">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
