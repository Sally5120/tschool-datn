<?php

namespace App\Http\Controllers;

use App\Models\PostClass;
use Illuminate\Http\Request;
use App\Models\CategorySubject;
use App\Models\CategoryTeacher;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class PostClassController extends Controller
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

        $khoahoc = PostClass::with('monhoc')->orderBy('id', 'DESC')->get();
        return view('admin.postclass.index')->with(compact('khoahoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();

        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->get();
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        return view('admin.postclass.create')->with(compact('monhoc', 'giaovien'));
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
                'id_monhoc' => 'required',
                'id_giaovien' => 'required',
                'tieude' => 'required|unique:post_classes|max:255',
                'slug_post' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'lichkhaigiang' => 'required',
                'Soluonghocvien'=>'required'


            ],
            [
                'tieude.unique' => 'Ti??u ????? kh??a h???c ???? c??.Vui l??ng ??i???n t??n kh??c',
                'tieude.max' => 'Ti??u ????? kh??a h???c kh??ng v?????t qu?? 255 k?? t???',
                'tieude.required' => 'B???n ph???i ??i???n ti??u ????? kh??a h???c',
                'slug_post.required' => 'B???n ph???i ??i???n slug kh??a h???c',
                'tomtat.required' => 'B???n ph???i ??i???n t??m t???t kh??a h???c',
                'noidung.required' => 'B???n ph???i ??i???n n???i dung kh??a h???c',
                'hinhanh.required' => 'B???n ph???i c?? h??nh ???nh kh??a h???c',
                'lichkhaigiang.required' => 'B???n ph???i c?? l???ch khai gi???ng kh??a h???c',
                'Soluonghocvien.required' => 'B???n ph???i ??i???n s??? l?????ng h???c vi??n',

            ]
        );
        $khoahoc = new PostClass();
        $khoahoc->tieude = $data['tieude'];
        $khoahoc->id_monhoc = $data['id_monhoc'];
        $khoahoc->id_giaovien = $data['id_giaovien'];
        $khoahoc->slug_post = $data['slug_post'];
        $khoahoc->tomtat = $data['tomtat'];
        $khoahoc->noidung = $data['noidung'];
        $khoahoc->kichhoat = $data['kichhoat'];
        $khoahoc->lichkhaigiang = $data['lichkhaigiang'];
        $khoahoc->Soluonghocvien=$data['Soluonghocvien'];

        $get_image = $request->hinhanh;
        $path = 'public/uploads/khoahoc/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $khoahoc->hinhanh = $new_image;


        $khoahoc->save();
        return redirect()->back()->with('status', 'Th??m kh??a h???c th??nh c??ng');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostClass  $postClass
     * @return \Illuminate\Http\Response
     */
    public function show(PostClass $postClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostClass  $postClass
     * @return \Illuminate\Http\Response
     */
    public function edit($postClass)
    {
        $this->AuthLogin();

        $khoahoc = PostClass::find($postClass);
        $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::orderBy('id', 'DESC')->get();
        return view('admin.postclass.edit')->with(compact('monhoc', 'khoahoc', 'giaovien'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostClass  $postClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postClass)
    {

        $this->AuthLogin();
        $data = $request->validate(
            [

                'tieude' => 'required|max:255|unique:post_classes,tieude,'.$postClass,
                'slug_post' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'id_monhoc' => 'required',
                'id_giaovien' => 'required',
                'lichkhaigiang' => 'required',
                'Soluonghocvien'=>'required'

            ],
            [
                'tieude.unique' => 'Ti??u ????? kh??a h???c ???? c??.Vui l??ng ??i???n t??n kh??c',
                'tieude.max' => 'Ti??u ????? kh??a h???c kh??ng v?????t qu?? 255 k?? t???',
                'tieude.required' => 'B???n ph???i ??i???n ti??u ????? kh??a h???c',
                'slug_post.required' => 'B???n ph???i ??i???n slug kh??a h???c',
                'tomtat.required' => 'B???n ph???i ??i???n t??m t???t kh??a h???c',
                'noidung.required' => 'B???n ph???i ??i???n n???i dung kh??a h???c',
                'Soluonghocvien.required' => 'B???n ph???i ??i???n s??? l?????ng h???c vi??n',
                

            ]
        );
        $khoahoc = PostClass::find($postClass);
        $khoahoc->tieude = $data['tieude'];
        $khoahoc->id_monhoc = $data['id_monhoc'];
        $khoahoc->id_giaovien = $data['id_giaovien'];
        $khoahoc->slug_post = $data['slug_post'];
        $khoahoc->tomtat = $data['tomtat'];
        $khoahoc->noidung = $data['noidung'];
        $khoahoc->kichhoat = $data['kichhoat'];
        $khoahoc->lichkhaigiang = $data['lichkhaigiang'];
        $khoahoc->Soluonghocvien=$data['Soluonghocvien'];
        $get_image = $request->hinhanh;
        if ($get_image) {

            $path = 'public/uploads/khoahoc/' . $khoahoc->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/khoahoc/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $khoahoc->hinhanh = $new_image;
        }
        $khoahoc->save();

        return redirect()->back()->with('status', 'C???p nh???t kh??a h???c th??nh c??ng');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostClass  $postClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($postClass)
    {

        $this->AuthLogin();
        $khoahoc = PostClass::find($postClass);
        $path = 'public/uploads/teachers/' . $khoahoc->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        PostClass::find($postClass)->delete();
        return redirect()->back()->with('status', 'X??a kh??a h???c th??nh c??ng');
    }
}
