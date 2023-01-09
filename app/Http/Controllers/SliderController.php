<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class SliderController extends Controller
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
        $slider = Slider::orderBy('id', 'DESC')->get();
        return view('admin.sliders.index')->with(compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.sliders.create');
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

                'slider_name' => 'required|unique:sliders|max:255',
                'slug_slider' => 'required|unique:sliders|max:255',
                'slider_desc' => 'required',
                'slider_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'kichhoat' => 'required'

            ],
            [
                'slider_name.unique' => 'Tên slider  đã có.Vui lòng điền tên khác',
                'slug_slider.unique' => 'Slug slider đã có. Vui lòng điền tên khác',
                'slider_name.required' => 'Bạn phải điền tên slider',
                'slug_slider.required' => 'Bạn phải điền slug slider',
                'slider_desc.required' => 'Bạn phải điền mô tả slider',
                'slider_image.required' => 'Bạn phải có hình ảnh thông tin'

            ]
        );
        $slider = new Slider();
        $slider->slider_name = $data['slider_name'];
        $slider->slug_slider = $data['slug_slider'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->kichhoat = $data['kichhoat'];


        $get_image = $request->slider_image;
        $path = 'public/uploads/Slider/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $slider->slider_image = $new_image;


        $slider->save();
        return redirect()->back()->with('status', 'Thêm slider thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($slider)
    {
        $this->AuthLogin();
        $slider = Slider::find($slider);
        return view('admin.sliders.edit')->with(compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $slider)
    { $this->AuthLogin();

        $data = $request->validate(
            [

                'slider_name' => 'required|max:255',
                'slug_slider' => 'required|max:255',
                'slider_desc' => 'required',
                'kichhoat' => 'required'

            ],
            [

                'slider_name.required' => 'Bạn phải điền tên slider ',
                'slug_slider.required' => 'Bạn phải điền slug slider',
                'slider_desc.required' => 'Bạn phải điền mô tả slider',



            ]
        );
        $slider = Slider::find($slider);
        $slider->slider_name = $data['slider_name'];
        $slider->slug_slider = $data['slug_slider'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->kichhoat = $data['kichhoat'];


        $get_image = $request->slider_image;
        if ($get_image) {

            $path = 'public/uploads/Slider/' . $slider->slider_image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/Slider/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $slider->slider_image = $new_image;
        }


        $slider->save();
        return redirect()->back()->with('status', 'Cập nhật slider thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider)
    {
        $this->AuthLogin();
        $anh = Slider::find($slider);
        $path = 'public/uploads/teachers/' . $anh->slider_image;
        if (file_exists($path)) {
            unlink($path);
        }
        Slider::find($slider)->delete();
        return redirect()->back()->with('status', 'Xóa slider thành công');
    }
}
