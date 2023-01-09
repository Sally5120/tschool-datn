<?php

namespace App\Http\Controllers;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Models\CategorySubject;
use App\Models\PostClass;
use App\Models\CategoryTeacher;
use App\Models\Statistical;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\News;
use App\Models\contact;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;

session_start();
class IndexController extends Controller
{

    public function home()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(3)->get();
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        $news = News::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        $khoahocgoiy = PostClass::orderBy(DB::raw('RAND()'))->where('kichhoat', 0)->limit(4)->get();
        $giaovien = CategoryTeacher::orderBy(DB::raw('RAND()'))->where('kichhoat', 0)->limit(4)->get();
        $demhocsinhdangky = contact::all()->count();
        $demgiaovien =CategoryTeacher::all()->count();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        # view('pages.home')->with(compact('monhoc', 'khoahoc', 'slider', 'news','demhocsinhdangky','demgiaovien'));
        return view('pages.home')->with(compact('monhoc', 'khoahoc', 'khoahocgoiy', 'giaovien', 'slider', 'news','demhocsinhdangky','demgiaovien','about'));
    }
    
    public function subject($slug)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        $id_monhoc = CategorySubject::where('slug_monhoc', $slug)->where('kichhoat', 0)->first();
        $tenmonhoc = $id_monhoc->tenmonhoc;
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->where('id_monhoc', $id_monhoc->id)->get();
        return view('pages.subject')->with(compact('monhoc', 'khoahoc', 'giaovien', 'tenmonhoc','about'));
    }
    public function khoahoc($slug)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $khoahoc = PostClass::with('monhoc', 'giaovien')->where('slug_post', $slug)->where('kichhoat', 0)->first();
        $cungdanhmuc = PostClass::with('monhoc', 'giaovien')->where('id_monhoc', $khoahoc->monhoc->id)->whereNotIn('id', [$khoahoc->id])->paginate(4);;
        $post_by_id = PostClass::with('monhoc')->where('kichhoat',0)->where('slug_post',$slug)->take(1)->get();
        foreach($post_by_id as $key => $p){
            $post_id = $p->id;
        }
        $post = PostClass::where('id',$post_id)->first();
        $post->views = $post->views + 1;
        $post->save();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.khoahoc')->with(compact('monhoc', 'khoahoc', 'giaovien', 'cungdanhmuc','post_by_id','about'));
    }

    public function giaovien($slug)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->where('slug_giaovien', $slug)->first();
        $tengiaovien = $giaovien->tengiaovien;
        $giaovienkhac = CategoryTeacher::orderBy('id', 'DESC')->whereNotIn('id', [$giaovien->id])->paginate(4);;
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.detail_giaovien')->with(compact('monhoc', 'giaovien', 'tengiaovien', 'giaovienkhac','about'));
    }
    public function allkhoahoc()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(8);;
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.allkhoahoc')->with(compact('monhoc', 'giaovien', 'khoahoc','about'));
        
    }
    public function allgiaovien()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(16);
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.allgiaovien')->with(compact('monhoc', 'khoahoc', 'giaovien','about'));
    }
    public function about()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();

        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->get();

        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.aboutus')->with(compact('monhoc', 'khoahoc', 'giaovien', 'about'));
    }
    public function allnews()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();

        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->get();

        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        $allnews = News::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(8);;
        return view('pages.allnews')->with(compact('monhoc', 'khoahoc', 'giaovien', 'about', 'allnews'));
    }

    public function detailnew($slug)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $details_news = News::orderBy('id', 'DESC')->where('kichhoat', 0)->where('slug_tintuc', $slug)->first();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        $details_news->views = $details_news->views + 1;
        $details_news->save();
        return view('pages.detail_news')->with(compact('monhoc', 'details_news','about'));
    }
    public function timkiem()
    {
        $tukhoa = $_GET['tukhoa'];
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $timkiem = PostClass::with('monhoc', 'giaovien')->where('tieude', 'LIKE', '%' . $tukhoa . '%')->orWhere('tomtat', 'LIKE', '%' . $tukhoa . '%')->orWhere('noidung', 'LIKE', '%' . $tukhoa . '%')->paginate(8);;
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.timkiem')->with(compact('monhoc', 'giaovien', 'timkiem', 'tukhoa','about'));
    }
    public function contact()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        return view('pages.contact')->with(compact('monhoc', 'giaovien','about'));;
    }
    
    public function dangky(Request $request)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $data = array();
        $data['hoten'] = $request->hoten;
        $data['email'] = $request->email;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['khoahocquantam'] = $request->khoahocquantam;
        $data['date_contact'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $data['trangthai'] = 0;
        $id = DB::table('contacts')->insertGetId($data);
        Session::put('id', $id);
        Session::put('hoten', $request->hoten);
        return Redirect::to('/lien-he');
    }
}
