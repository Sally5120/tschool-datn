<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN-Trung tâm luyện thi</title>

    <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('public/backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('public/backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{asset('public/backend/css/animate.cs')}}s" rel="stylesheet">
    <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <?php
                            $image = Session::get('admin_image');
                            if ($image) {
                         ?>
                                <img src="{{ asset('public/uploads/admin/'.$image) }}" alt="Error" class="img-circle"
                                    style="width: 50px; height:50px">

                                <?php
                            }
                            ?>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs">
                                    </span> <span class="text-muted text-xs block" id="droplist_user"><strong class="font-bold"> <?php
                                    $name = Session::get('admin_name');
                                    if ($name) {
                                        echo $name;

                                    }
                                    ?></strong> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" >
                                <li><a href="{{url('/profile')}}" id="information">Thông tin cá nhân</a></li>
                                <li><a href="{{url('/doi-mat-khau')}}" id="change_password">Đổi mật khẩu</a></li>
                                <li><a href="{{url('/logout')}}" id="logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="{{url('/dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Trang
                                Chủ</span> </a>

                    </li>

                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label" id="subject_category">Danh mục
                                môn học</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('categorysubject.create') }}" id="create_subject">Thêm danh mục</a>
                            </li>
                            <li><a href="{{ route('categorysubject.index') }}" id="list_subject">Liệt kê danh mục </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label" id="teacher_category">Danh mục
                                giáo viên</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('categoryteacher.create') }}" id="create_teacher">Thêm giáo viên</a>
                            </li>
                            <li><a href="{{ route('categoryteacher.index') }}" id="list_teacher">Liệt kê giáo viên </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Slider</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('sliders.create') }}">Thêm ảnh Slider</a></li>
                            <li><a href="{{ route('sliders.index') }}">Liệt kê ảnh Slider </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label" id="course">Khóa
                                học</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('postclass.create')}}" id="create_course">Thêm khóa học</a></li>
                            <li><a href="{{ route('postclass.index')}}" id="list_course">Liệt kê khóa học </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-paper-plane-o"></i> <span class="nav-label" id="new_category">Danh
                                mục tin tức</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('news.create') }}" id="create_new">Thêm tin tức</a></li>
                            <li><a href="{{ route('news.index') }}" id="list_new">Liệt kê tin tức </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="fa fa-envelope"></i> <span class="nav-label" id="register_student">Học sinh
                                đăng ký</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('contact.index') }}" id="contacted">Chưa liên hệ</a></li>
                            <li><a href="{{ url('da-lien-he') }}" id="not_contacted">Đã liên hệ </a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="{{ route('aboutus.index') }}"><i class="fa fa-star"></i> <span class="nav-label">Về
                                chúng tôi</span></a>

                    </li>

                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Chào mừng bạn đến với trang quản trị</span>
                        </li>
                    </ul>

                </nav>
                <section class="wrapper">
                    @yield('content')
                </section>



                <div class="footer">

                    <div>
                        <p>&copy; 2021 <a href="#"></a>. All Rights Reserved. Designed &amp; Developed with <i
                                class="icon icon-heart"></i> by <a href="#">Trung tâm luyện thi.vn</a></p>
                    </div>
                </div>
            </div>





            <!-- Data Tables -->
            <script src="{{ asset('public/backend/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>



            <!-- Page-Level Scripts -->


            <!-- Mainly scripts -->
            <script src="{{ asset('public/backend/js/jquery-2.1.1.js') }}"></script>
            <script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
            <script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
            <!-- Flot -->
            <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.spline.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.resize.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/flot/jquery.flot.pie.js') }}"></script>

            <!-- Peity -->
            <script src="{{ asset('public/backend/js/plugins/peity/jquery.peity.min.js') }}"></script>
            <script src="{{ asset('public/backend/js/demo/peity-demo.js') }}"></script>

            <!-- Custom and plugin javascript -->
            <script src="{{ asset('public/backend/js/inspinia.js') }}"></script>
            <script src="{{ asset('public/backend/js/plugins/pace/pace.min.js') }}"></script>

            <!-- jQuery UI -->
            <script src="{{ asset('public/backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            <!-- GITTER -->
            <script src="{{ asset('public/backend/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

            <!-- Sparkline -->
            <script src="{{ asset('public/backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

            <!-- Sparkline demo data  -->
            <script src="{{ asset('public/backend/js/demo/sparkline-demo.js') }}"></script>

            <!-- ChartJS-->
            <script src="{{ asset('public/backend/js/plugins/chartJs/Chart.min.js') }}"></script>

            <!-- Toastr -->
            <script src="{{ asset('public/backend/js/plugins/toastr/toastr.min.js') }}"></script>


            <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('trungtamluyenthi.vn','Chào mừng đến với trang quản trị');

                }, 1300);


                var data1 = [
                    [0, 4],
                    [1, 8],
                    [2, 5],
                    [3, 10],
                    [4, 4],
                    [5, 16],
                    [6, 5],
                    [7, 11],
                    [8, 6],
                    [9, 11],
                    [10, 30],
                    [11, 10],
                    [12, 13],
                    [13, 4],
                    [14, 3],
                    [15, 3],
                    [16, 6]
                ];
                var data2 = [
                    [0, 1],
                    [1, 0],
                    [2, 2],
                    [3, 0],
                    [4, 1],
                    [5, 3],
                    [6, 1],
                    [7, 5],
                    [8, 2],
                    [9, 3],
                    [10, 2],
                    [11, 1],
                    [12, 0],
                    [13, 2],
                    [14, 8],
                    [15, 0],
                    [16, 0]
                ];
                $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                    data1, data2
                ], {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#464f88"],
                    xaxis: {},
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                });

                var doughnutData = [{
                        value: 300,
                        color: "#a3e1d4",
                        highlight: "#1ab394",
                        label: "App"
                    },
                    {
                        value: 50,
                        color: "#dedede",
                        highlight: "#1ab394",
                        label: "Software"
                    },
                    {
                        value: 100,
                        color: "#b5b8cf",
                        highlight: "#1ab394",
                        label: "Laptop"
                    }
                ];

                var doughnutOptions = {
                    segmentShowStroke: true,
                    segmentStrokeColor: "#fff",
                    segmentStrokeWidth: 2,
                    percentageInnerCutout: 45, // This is 0 for Pie charts
                    animationSteps: 100,
                    animationEasing: "easeOutBounce",
                    animateRotate: true,
                    animateScale: false,
                };

                var ctx = document.getElementById("doughnutChart").getContext("2d");
                var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

                var polarData = [{
                        value: 300,
                        color: "#a3e1d4",
                        highlight: "#1ab394",
                        label: "App"
                    },
                    {
                        value: 140,
                        color: "#dedede",
                        highlight: "#1ab394",
                        label: "Software"
                    },
                    {
                        value: 200,
                        color: "#b5b8cf",
                        highlight: "#1ab394",
                        label: "Laptop"
                    }
                ];

                var polarOptions = {
                    scaleShowLabelBackdrop: true,
                    scaleBackdropColor: "rgba(255,255,255,0.75)",
                    scaleBeginAtZero: true,
                    scaleBackdropPaddingY: 1,
                    scaleBackdropPaddingX: 1,
                    scaleShowLine: true,
                    segmentShowStroke: true,
                    segmentStrokeColor: "#fff",
                    segmentStrokeWidth: 2,
                    animationSteps: 100,
                    animationEasing: "easeOutBounce",
                    animateRotate: true,
                    animateScale: false,
                };
                var ctx = document.getElementById("polarChart").getContext("2d");
                var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

            });
            </script>
            <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-4625583-2', 'webapplayers.com');
            ga('send', 'pageview');
            </script>
            <script type="text/javascript">
            function ChangeToSlug() {
                var slug;

                //Lấy text từ thẻ input title
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
                    '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
            </script>


            <!-- <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script> -->
            <!-- <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> -->
            {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
            <script type="text/javascript" src=" https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                CKEDITOR.replace('ckeditor_giaovien');
                CKEDITOR.replace('ckeditor_tomtatgiaovien');
                CKEDITOR.replace('ckeditor_shortdesc');
                CKEDITOR.replace('ckeditor_noidung');
                CKEDITOR.replace('ckeditor_monhoc');
                CKEDITOR.replace('ckeditor_thongtin');
                CKEDITOR.replace('ckeditor_tomtatthongtin');
                CKEDITOR.replace('ckeditor_tintuc');
                CKEDITOR.replace('ckeditor_tomtattintuc');
                CKEDITOR.replace('ckeditor_slider');

            });
            </script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
            <script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>

            <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script type="text/javascript">
            $(function() {
                $("#datepicker").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow"

                });
                $("#datepicker2").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow"
                });
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {

                //     });
                var donut = Morris.Donut({
                    element: 'donut',
                    resize: true,
                    colors: [
                        '#a8328e',
                        '#61a1ce',
                        '#ce8f61',
                        '#f5b942',
                        '#4842f5'

                    ],
                    //labelColor:"#cccccc", // text color
                    //backgroundColor: '#333333', // border color
                    data: [{
                            label: "Khóa học",
                            value: <?php echo $demkhoahoc ?>
                        },
                        {
                            label: "Học sinh đăng ký",
                            value: <?php echo $demhocsinhdangky ?>
                        },
                        {
                            label: "Giáo viên",
                            value: <?php echo $demgiaovien ?>
                        },
                        {
                            label: "Môn học",
                            value: <?php echo $demmonhoc ?>
                        },
                        {
                            label: "Tin tức",
                            value: <?php echo $demtintuc ?>
                        }

                    ]
                });

            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {

                chart60daysorder();

                var chart = new Morris.Bar({

                    element: 'chart',
                    //option chart
                    lineColors: ['#819C79', '#fc8710'],
                    parseTime: false,
                    hideHover: 'auto',
                    xkey: 'period',
                    ykeys: ['quantity'],
                    labels: ['số lượng']

                });



                function chart60daysorder() {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/days')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                }

                $('.dashboard-filter').change(function() {
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    // alert(dashboard_value);
                    $.ajax({
                        url: "{{url('/dashboard-filter')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            dashboard_value: dashboard_value,
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });

                });

                $('#btn-dashboard-filter').click(function() {

                    var _token = $('input[name="_token"]').val();

                    var from_date = $('#datepicker').val();
                    var to_date = $('#datepicker2').val();

                    $.ajax({
                        url: "{{url('/filter-by-date')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });

                });

            });
            </script>

</body>

</html>