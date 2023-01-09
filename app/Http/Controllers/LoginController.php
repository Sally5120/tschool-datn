<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Statistical;
use App\Models\CategorySubject;
use App\Models\CategoryTeacher;
use App\Models\PostClass;
use App\Models\News;


use App\Models\Login;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Validator;

session_start();
class LoginController extends Controller
{


    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {

        return view('admin.login');
    }


    public function dashboard(Request $request)
    {

        $admin_account = $request->admin_account;
        $admin_password = md5($request->admin_password);

        $result = DB::table('logins')->where('admin_account', $admin_account)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_image', $result->admin_image);
            Session::put('id', $result->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản không đúng');
            return Redirect::to('/admin');
        }
    }


    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }

    public function show()
    {
        $this->AuthLogin();


        $demtintuc= News::all()->count();
        $demkhoahoc = PostClass::all()->count();
        $demmonhoc=CategorySubject::all()->count();
        $demhocsinhdangky = contact::all()->count();
        $demgiaovien =CategoryTeacher::all()->count();
        $news_views = News::orderBy('views','DESC')->where('kichhoat','0')->take(20)->get();
        $post_views = PostClass::orderBy('views','DESC')->where('kichhoat','0')->take(20)->get();


        return view('admin.statistical')->with(compact('demtintuc','demkhoahoc','demmonhoc','demhocsinhdangky','demgiaovien','news_views','post_views'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function dashboard_filter(Request $request){

        $data = $request->all();

            // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
           // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
           // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
           // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
           // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();



        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        // $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth()->toDateString();
        // $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth()->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){

            $get =Statistical::whereBetween('date',[$sub7days,$now])->orderBy('date','ASC')->get();

        }elseif($data['dashboard_value']=='thangtruoc'){

            $get =Statistical::whereBetween('date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('date','ASC')->get();

        }elseif($data['dashboard_value']=='thangnay'){

            $get =Statistical::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();



        }else{
            $get =Statistical::whereBetween('date',[$sub365days,$now])->orderBy('date','ASC')->get();
        }


        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->date,

                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);

    }
    public function days(){

        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = Statistical::whereBetween('date',[$sub60days,$now])->orderBy('date','ASC')->get();


        foreach($get as $key => $val){

           $chart_data[] = array(
            'period' => $val->date,

            'quantity' => $val->quantity
        );

       }

       echo $data = json_encode($chart_data);
    }


    public function filter_by_date(Request $request){

        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get =Statisticalal::whereBetween('date',[$from_date,$to_date])->orderBy('date','ASC')->get();


        foreach($get as $key => $val){

            $chart_data[] = array(

                'period' => $val->date,

                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);

    }

    public function doimatkhau(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin=Login::find($admin_id);

        return view('admin.doimatkhau')->with(compact('admin'));
    }

    public function update_mat_khau(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $data=$request->all();
        $admin=Login::find($admin_id);
        $admin_password=$admin->admin_password;
        $matkhaucu=md5($request->matkhaucu);
        $new_password=md5($request->matkhaumoi);
        $nhaplai=md5($request->nhaplai);
        if($admin_password==$matkhaucu && $new_password==$nhaplai){

            $admin->admin_password = md5($data['matkhaumoi']);
            $admin->save();

            return redirect()->back()->with('status', 'Đổi mật khẩu thành công');
        }
        elseif($admin_password!=$matkhaucu){
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }elseif($new_password!=$nhaplai){
            return redirect()->back()->with('error', 'Mật khẩu nhập lại không đúng');
        }
        else{
            return redirect()->back()->with('error', 'Đổi mật khẩu thất bại. Vui lòng nhập lại');
        }

    }
    public function profile(){
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin=Login::find($admin_id);

        return view('admin.profile')->with(compact('admin'));
    }
    public function change_profile(){
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin=Login::find($admin_id);

        return view('admin.change_profile')->with(compact('admin'));
    }
    public function update_profile(Request $request){
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $data = $request->validate(
            [
                'admin_name' => 'required|max:255',
                'admin_address' => 'required|max:255',
                'admin_phone' => 'required',
                'admin_email' => 'required',


            ],
            [

                'admin_name.required' => 'Bạn phải điền tên của bạn',
                'admin_address.required' => 'Bạn phải điền địa chỉ',
                'admin_phone.required' => 'Bạn phải số điện thoại',
                'admin_email.required' => 'Bạn phải điền email'


            ]
        );
        $profile = Login::find($admin_id);

        $profile->admin_name = $data['admin_name'];
        $profile->admin_phone = $data['admin_phone'];
        $profile->admin_email= $data['admin_email'];
        $profile->admin_address = $data['admin_address'];
        $get_image = $request->admin_image;
        if ($get_image) {

            $path = 'public/uploads/admin/' . $profile->admin_image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/admin/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $profile->admin_image = $new_image;
        }
        $profile->save();
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công');
        Session::regenerate();
    }


}



