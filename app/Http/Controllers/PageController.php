<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
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
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function homepage()
    {
        // $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        // $slider = Slider::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(3)->get();
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        $news = News::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        //$khoahocgoiy = PostClass::orderBy(DB::raw('RAND()'))->where('kichhoat', 0)->limit(4)->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(4)->get();
        $demhocsinhdangky = contact::all()->count();
        $demgiaovien =CategoryTeacher::all()->count();
        $about = AboutUs::orderBy('id', 'DESC')->limit(1)->where('kichhoat', 0)->get();
        # view('pages.home')->with(compact('monhoc', 'khoahoc', 'slider', 'news','demhocsinhdangky','demgiaovien'));
        //return view('pages.home')->with(compact('monhoc', 'khoahoc', 'khoahocgoiy', 'giaovien', 'slider', 'news','demhocsinhdangky','demgiaovien','about'));
        return response()->json(['course'=>$khoahoc,'news'=>$news,'teacher'=>$giaovien])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    } 
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function contact(Request $request)
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        // $data = $request->validate(
        //     [
        //         'hoten' => 'required|max:255',
        //         'email' => 'required|max:255',
        //         'sodienthoai' => 'required|max:15'


        //     ],
        //     [

        //         'hoten.required' => 'Bạn phải điền họ tên',
        //         'email.required' => 'Bạn phải điền email',
        //         'sodienthoai.required' => 'Bạn phải số điện thoại',
        //         'sodienthoai.max' => 'Bạn phải điền đúng định dạng'


        //     ]
        // );
        $validator= Validator::make($request->all(),[
            'hoten' => 'required|max:255',
            'email' => 'required|email|max:255',
            'sodienthoai'=>'required|max:15',
            'khoahocquantam'=>'required',

        ]);        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }        
        // $data = array();
        $data['hoten'] = $request->hoten;
        $data['email'] = $request->email;
        $data['sodienthoai'] = $request->sodienthoai;
        $data['khoahocquantam'] = $request->khoahocquantam;
        $data['date_contact'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $data['trangthai'] = 0;
        $id = DB::table('contacts')->insertGetId($data);
        Session::put('id', $id);
        Session::put('hoten', $request->hoten);
        return response()->json(['message'=>'add contact successfully']);
       
    }
    public function subject()
    {
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        return response()->json(['subject'=>$monhoc])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    } 
    public function course()
    {
        $khoahoc = PostClass::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        return response()->json(['course'=>$khoahoc])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    } 
    public function teacher()
    {
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(4)->get();
        return response()->json(['teacher'=>$giaovien])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    }
    public function news()
    { 
        $news = News::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(6)->get();
        return response()->json(['news'=>$news])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    } 
    public function slider()
    {
        $slider = Slider::orderBy('id', 'DESC')->where('kichhoat', 0)->limit(3)->get();
        return response()->json(['slider'=>$slider])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    }  
}
