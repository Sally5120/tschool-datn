<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trung tâm luyện thi</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template"> --}}

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.min.css') }}">
    <link rel="stylesheet" href="{{  asset('public/frontend/css/custom.css') }} ">


</head>

<body>
    <div class="probootstrap-search" id="probootstrap-search">
        <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
        <form action="{{ url('tim-kiem') }}" method="GET">

            <input type="search" name="tukhoa" id="search" placeholder="Nhập từ khóa bạn muốn tìm kiếm...">
        </form>
    </div>

    <div class="probootstrap-page-wrapper">
        <!-- Fixed navbar -->
        @foreach ($about as $key=>$item)
        <div class="probootstrap-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
                        <span><i class="icon-location2"></i>{{ $item->diachi }}</span>
                        <span><i class="icon-phone2"></i>{{ $item->sodienthoai }} </span>
                        <span><i class="icon-mail"></i>{{ $item->email }}</span>
                        <span><a href="{{ $item->url }}"><i class="icon-facebook2"></i></a>Fanpage</span>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
                        <ul>
                            <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i
                                        class="icon-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <nav class="navbar navbar-default probootstrap-navbar">
            <div class="container">
                <div class="navbar-header">
                    <div class="btn-more js-btn-more visible-xs">
                        <a href="#"><i class="icon-dots-three-vertical "></i></a>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}"><img src="{{ asset('public/images/logo.png') }}" alt=""
                            style="padding-top:20px"></a>
                </div>

                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Chọn môn học</a>
                            <ul class="dropdown-menu">
                                {{-- <li><a href="about.html">About Us</a></li>
                          <li><a href="courses.html">Courses</a></li>
                          <li><a href="course-single.html">Course Single</a></li>
                          <li><a href="gallery.html">Gallery</a></li> --}}
                                @foreach ($monhoc as $key=>$item)
                                <li>

                                    <a
                                        href="{{ url('danh-muc-mon-hoc/'.$item->slug_monhoc) }}"><span>{{ $item->tenmonhoc }}</span></a>
                                    {{-- <ul class="dropdown-menu">
                                <li><a href="#">Second Level Menu</a></li>
                                <li><a href="#">Second Level Menu</a></li>
                                <li><a href="#">Second Level Menu</a></li>
                                <li><a href="#">Second Level Menu</a></li>
                              </ul> --}}
                                </li>
                                @endforeach
                                {{-- <li><a href="news.html">News</a></li> --}}
                            </ul>
                        </li>
                        {{-- <li><a href="courses.html">Khóa học</a></li> --}}
                        <li><a href="{{ url('toan-bo-giao-vien/') }}">Giáo viên</a></li>
                        <li><a href="{{ url('toan-bo-khoa-hoc/') }}">Khóa học hiện có</a></li>
                        <li><a href={{ url('toan-bo-tin-tuc/') }}>Tin tức</a></li>
                        <li><a href="{{ url('lien-he/') }}">Liên hệ</a></li>
                        <li><a href="{{ url('ve-chung-toi/') }}">Về chúng tôi</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- slider --}}

        @yield('slide')

        {{-- endslider --}}


        {{-- endvideo --}}


        {{-- home --}}
        @yield('content')

        @yield('teacher')

        @yield('whychoose')
        @yield('link')
        {{-- endhome --}}
        {{-- teacher --}}

        {{-- endteacher --}}

        <footer class="probootstrap-footer probootstrap-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="probootstrap-footer-widget">
                            <h3>Trung tâm luyện thi</h3>
                            <p>Kinh nghiệm,nhiệt tình kết hợp với bài giảng hay đưa đến bài học các môn TOÁN, LÝ, HÓA,
                                VĂN, ANH tốt nhất cho các em học sinh.
                                <br>
                                Hãy đăng ký ngay để đến lớp học cảm nhận nhé!
                            </p>

                        </div>
                    </div>
                    <div class="col-md-3 col-md-push-1">
                        <div class="probootstrap-footer-widget">
                            <h3>Điều hướng</h3>
                            <ul>
                                <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                                <li><a href="{{ url('toan-bo-khoa-hoc/') }}">Khóa Học</a></li>
                                <li><a href="{{ url('toan-bo-giao-vien/') }}">Giáo Viên</a></li>
                                <li><a href="{{ url('toan-bo-tin-tuc/') }}">Tin Tức</a></li>
                                <li><a href="{{ url('lien-he/') }}">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($about as $key=>$item)
                    <div class="col-md-3">
                        <div class="probootstrap-footer-widget">
                            <h3>Thông tin</h3>
                            <ul class="probootstrap-contact-info">
                                <li><i class="icon-location2"></i> <span>{{$item->diachi}}</span>
                                </li>
                                <li><i class="icon-mail"></i><span>{{$item->email}}</span></li>
                                <li><i class="icon-phone2"></i><span>{{$item->sodienthoai}}</span></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($about as $key=>$item)
                    <div class="col-md-3">
                        <div class="probootstrap-footer-widget">
                            <h3>Fanpage</h3>
                            <div class="fb-page" data-href="{{$item->url}}" data-tabs="timeline"
                                data-width="" data-height="280" data-small-header="false"
                                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="{$item->url}}" class="fb-xfbml-parse-ignore"><a
                                        href="{$item->url}}">trungtamluyenthi.vn</a></blockquote>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

    <div id="fb-root"></div>


<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "108129601506018");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> 
                <!-- END row -->
            </div>
            <div class="probootstrap-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 text-left">
                            <p>&copy; 2021 <a href="#"></a>. All Rights Reserved. Designed &amp; Developed with <i
                                    class="icon icon-heart"></i> by <a href="#">Trungtamluyenthi.vn</a></p>
                        </div>
                        <div class="col-md-4 probootstrap-back-to-top">
                            <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- END wrapper -->
   

    <script src="{{ asset('public/frontend/js/scripts.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0&appId=300848028198302&autoLogAppEvents=1" nonce="VI1MBB8S"></script>



</body>

</html>