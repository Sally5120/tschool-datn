@extends('admin.dashboard')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight" >

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
		<p style="text-align: center;
        font-size: 20px;
        font-weight: bold;padding-bottom:30px">Thống kê số lượng học sinh đăng ký</p>

		<form autocomplete="off">
			@csrf
			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
			</div>

			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

			</div>

			<div class="col-md-2">
				<p>
					Lọc theo:
					<select class="dashboard-filter form-control" >
						<option>--Chọn--</option>

						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>
				</p>
			</div>

		</form>

		<div class="col-md-12">
			<div id="chart" style="height: 250px;"></div>
		</div>

    </div>
        </div>
    </div>


    <div class="row" style="padding-top: 50px">
            <div class="ibox float-e-margins">
            <div class="col-md-4 col-xs-12" >
                <p style="text-align: center;
                font-size: 20px;
                font-weight: bold;">Thống kê số lượng</p>
                <div id="donut"></div>
            </div>

            <!--------------------------->

            <div class="col-md-4 col-xs-12">
                <h3>Khóa học xem nhiều</h3>

                <ol class="list_views">
                    @foreach($post_views as $key => $post)
                    <li>
                        <a target="_blank" href="{{url('/xem-khoa-hoc/'.$post->slug_post)}}">{{$post->tieude}} | <span style="color:black">{{$post->views}}</span></a>
                    </li>
                    @endforeach
                </ol>

            </div>

            <div class="col-md-4 col-xs-12">

                <h3>Tin tức xem nhiều</h3>

                <ol class="list_views">
                    @foreach($news_views as $key => $news)
                    <li>
                        <a target="_blank" href="{{url('/doc-tin-tuc/'.$news->slug_tintuc)}}">{{$news->tieude}} | <span style="color:black">{{$news->views}}</span></a>
                    </li>
                    @endforeach
                </ol>

            </div>
        </div>


        </div>
    </div>
</div>
@endsection
