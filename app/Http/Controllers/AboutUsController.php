<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class AboutUsController extends Controller
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
        $thongtin = AboutUs::orderBy('id', 'DESC')->get();
        return view('admin.aboutus.index')->with(compact('thongtin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.aboutus.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->AuthLogin();
    //     $data = $request->validate(
    //         [

    //             'tieude' => 'required|unique:about_us|max:255',
    //             'slug_thongtin' => 'required|unique:about_us|max:255',
    //             'tomtat' => 'required',
    //             'thongtin' => 'required',
    //             'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //             'kichhoat' => 'required',
    //             'sodienthoai'=>'required',
    //             'url'=>'required',
    //             'diachi'=>'required',
    //             'email'=>'required'

    //         ],
    //         [
    //             'tieude.unique' => 'Tiêu đề  đã có.Vui lòng điền tiêu đề khác',
    //             'slug_thongtin.unique' => 'Slug thông tin đã có. Vui lòng điền tên khác',
    //             'tieude.required' => 'Bạn phải điền tiêu đề thông tin',
    //             'slug_thongtin.required' => 'Bạn phải điền slug thông tin',
    //             'tomtat.required' => 'Bạn phải điền tóm tắt thông tin',
    //             'thongtin.required' => 'Bạn phải điền thông tin thông tin',
    //             'hinhanh.required' => 'Bạn phải có hình ảnh thông tin',
    //             'sodienthoai.required' => 'Bạn phải điền số điện thoại',
    //             'url.required' => 'Bạn phải điền url fanpage',
    //             'diachi.required' => 'Bạn phải điền địa chỉ',
    //             'email.required' => 'Bạn phải điền email'

    //         ]
    //     );
    //     $thongtin = new AboutUs();
    //     $thongtin->tieude = $data['tieude'];
    //     $thongtin->slug_thongtin = $data['slug_thongtin'];
    //     $thongtin->tomtat = $data['tomtat'];
    //     $thongtin->thongtin = $data['thongtin'];
    //     $thongtin->kichhoat = $data['kichhoat'];
    //     $thongtin->sodienthoai = $data['sodienthoai'];
    //     $thongtin->url = $data['url'];
    //     $thongtin->diachi = $data['diachi'];
    //     $thongtin->email = $data['email'];


    //     $get_image = $request->hinhanh;
    //     $path = 'public/uploads/aboutus/';
    //     $get_name_image = $get_image->getClientOriginalName();
    //     $name_image = current(explode('.', $get_name_image));
    //     $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
    //     $get_image->move($path, $new_image);
    //     $thongtin->hinhanh = $new_image;


    //     $thongtin->save();
    //     return redirect()->back()->with('status', 'Thêm thông tin thành công');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($aboutUs)
    {
        $this->AuthLogin();
        $thongtin = AboutUs::find($aboutUs);
        return view('admin.aboutus.edit')->with(compact('thongtin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $aboutUs)
    {

        $this->AuthLogin();
        $data = $request->validate(
            [

                'tieude' => 'required|max:255',
                'slug_thongtin' => 'required|max:255',
                'tomtat' => 'required',
                'thongtin' => 'required',
                'kichhoat' => 'required',
                'sodienthoai'=>'required',
                'url'=>'required',
                'diachi'=>'required',
                'email'=>'required'

            ],
            [

                'tenthongtin.required' => 'Bạn phải điền tên thông tin',
                'slug_thongtin.required' => 'Bạn phải điền slug thông tin',
                'tomtat.required' => 'Bạn phải điền tóm tắt thông tin',
                'thongtin.required' => 'Bạn phải điền thông tin thông tin',
                'sodienthoai.required' => 'Bạn phải điền số điện thoại',
                'url.required' => 'Bạn phải điền url fanpage',
                'diachi.required' => 'Bạn phải điền địa chỉ',
                'email.required' => 'Bạn phải điền email'


            ]
        );
        $thongtin = AboutUs::find($aboutUs);
        $thongtin->tieude = $data['tieude'];
        $thongtin->slug_thongtin = $data['slug_thongtin'];
        $thongtin->tomtat = $data['tomtat'];
        $thongtin->thongtin = $data['thongtin'];
        $thongtin->kichhoat = $data['kichhoat'];
        $thongtin->sodienthoai = $data['sodienthoai'];
        $thongtin->url = $data['url'];
        $thongtin->diachi = $data['diachi'];
        $thongtin->email = $data['email'];

        $get_image = $request->hinhanh;
        if ($get_image) {

            $path = 'public/uploads/aboutus/' . $thongtin->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/aboutus/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $thongtin->hinhanh = $new_image;
        }


        $thongtin->save();
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    
}
