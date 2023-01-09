<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $this->AuthLogin();
        $tintuc = News::orderBy('id', 'DESC')->get();
        return view('admin.news.index')->with(compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->AuthLogin();
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->AuthLogin();
        $data = $request->validate(
            [

                'tieude' => 'required|unique:news|max:255',
                'slug_tintuc' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'kichhoat' => 'required'

            ],
            [
                'tieude.unique' => 'Tiêu đề tin tức đã có.Vui lòng điền tiêu đề khác',
                'tieude.max' => 'Tên tin tức không vượt quá 255 ký tự',
                'tieude.required' => 'Bạn phải điền tiêu đề',
                'slug_tintuc.required' => 'Bạn phải điền slug thông tin',
                'tomtat.required' => 'Bạn phải điền tóm tắt tin tức',
                'noidung.required' => 'Bạn phải điền nội dung tin tức',
                'hinhanh.required' => 'Bạn phải có hình ảnh tin tức'

            ]
        );
        $tintuc = new News();
        $tintuc->tieude = $data['tieude'];
        $tintuc->slug_tintuc = $data['slug_tintuc'];
        $tintuc->tomtat = $data['tomtat'];
        $tintuc->noidung = $data['noidung'];
        $tintuc->kichhoat = $data['kichhoat'];
        $tintuc->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->hinhanh;
        $path = 'public/uploads/news/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $tintuc->hinhanh = $new_image;


        $tintuc->save();
        return redirect()->back()->with('status', 'Thêm tin tức thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($news)
    {

        $this->AuthLogin();
        $tintuc = News::find($news);
        return view('admin.news.edit')->with(compact('tintuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $news)
    {
        $this->AuthLogin();

        $data = $request->validate(
            [

                'tieude' => 'required|max:255|unique:news,tieude,'.$news,
                'slug_tintuc' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required'

            ],
            [

                'tieude.required' => 'Bạn phải điền tiêu đề',
                'tieude.max' => 'Tên tin tức không vượt quá 255 ký tự',
                'tieude.unique' => 'Tiêu đề tin tức đã có.Vui lòng điền tiêu đề khác',
                'slug_tintuc.required' => 'Bạn phải điền slug thông tin',
                'tomtat.required' => 'Bạn phải điền tóm tắt tin tức',
                'noidung.required' => 'Bạn phải điền nội dung tin tức',


            ]
        );
        $tintuc = News::find($news);
        $tintuc->tieude = $data['tieude'];
        $tintuc->slug_tintuc = $data['slug_tintuc'];
        $tintuc->tomtat = $data['tomtat'];
        $tintuc->noidung = $data['noidung'];
        $tintuc->kichhoat = $data['kichhoat'];
        $tintuc->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->hinhanh;
        if ($get_image) {

            $path = 'public/uploads/news/' . $tintuc->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/news/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $tintuc->hinhanh = $new_image;
        }


        $tintuc->save();
        return redirect()->back()->with('status', 'Cập nhật tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($news)
    {
        $this->AuthLogin();

        $tintuc = News::find($news);
        $path = 'public/uploads/news/' . $tintuc->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        News::find($news)->delete();
        return redirect()->back()->with('status', 'Xóa tin tức thành công');
    }
}
