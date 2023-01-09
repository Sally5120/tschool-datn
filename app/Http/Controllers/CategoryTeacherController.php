<?php

namespace App\Http\Controllers;

use App\Models\CategoryTeacher;

use App\Models\CategorySubject;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class CategoryTeacherController extends Controller
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
        $giaovienmonhoc = CategoryTeacher::orderBy('id', 'DESC')->get();
        return view('admin.categoryteacher.index')->with(compact('giaovienmonhoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->AuthLogin();
        // $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        // return view('admin.categoryteacher.create')->with(compact('monhoc'));
        return view('admin.categoryteacher.create');
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
                // 'id_monhoc' => 'required',
                'tengiaovien' => 'required|unique:category_teachers|max:255',
                'slug_giaovien' => 'required',
                'tomtat' => 'required',
                'thongtin' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'kichhoat' => 'required'

            ],
            [
                'tengiaovien.unique' => 'Tên giáo viên đã có.Vui lòng điền tên khác',
                'tengiaovien.max'=>'Tên giáo viên không vượt quá 255 ký tự',
                'tengiaovien.required' => 'Bạn phải điền tên giáo viên',
                'slug_giaovien.required' => 'Bạn phải điền slug giáo viên',
                'tomtat.required' => 'Bạn phải điền tóm tắt giáo viên',
                'thongtin.required' => 'Bạn phải điền thông tin giáo viên',
                'hinhanh.required' => 'Bạn phải có hình ảnh giáo viên'

            ]
        );
        $giaovienmonhoc = new CategoryTeacher();
        // $giaovienmonhoc->id_monhoc = $data['id_monhoc'];
        $giaovienmonhoc->tengiaovien = $data['tengiaovien'];
        $giaovienmonhoc->slug_giaovien = $data['slug_giaovien'];
        $giaovienmonhoc->tomtat = $data['tomtat'];
        $giaovienmonhoc->thongtin = $data['thongtin'];
        $giaovienmonhoc->kichhoat = $data['kichhoat'];


        $get_image = $request->hinhanh;
        $path = 'public/uploads/teachers/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $giaovienmonhoc->hinhanh = $new_image;


        $giaovienmonhoc->save();
        return redirect()->back()->with('status', 'Thêm giáo viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTeacher  $categoryTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTeacher $categoryTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTeacher  $categoryTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryTeacher)
    {
        $this->AuthLogin();
        // $monhoc = CategorySubject::orderBy('id', 'DESC')->get();
        $giaovien = CategoryTeacher::find($categoryTeacher);
        return view('admin.categoryteacher.edit')->with(compact('giaovien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryTeacher  $categoryTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryTeacher)
    {

        $this->AuthLogin();
        $data = $request->validate(
            [
                // 'id_monhoc' => 'required',
                'tengiaovien' => 'required|max:255|unique:category_teachers,tengiaovien,'.$categoryTeacher,
                'slug_giaovien' => 'required',
                'thongtin' => 'required',
                'tomtat' => 'required',
                'kichhoat' => 'required'

            ],
            [

                
                'tengiaovien.required' => 'Bạn phải điền tên giáo viên',
                'tengiaovien.unique' => 'Tên giáo viên đã có.Vui lòng điền tên khác',
                'tengiaovien.max'=>'Tên giáo viên không vượt quá 255 ký tự',
                'slug_giaovien.required' => 'Bạn phải điền slug giáo viên',
                'thongtin.required' => 'Bạn phải điền thông tin giáo viên',
                'tomtat.required' => 'Bạn phải điền tóm tắt giáo viên'
                


            ]
        );
        $giaovienmonhoc = CategoryTeacher::find($categoryTeacher);
        // $giaovienmonhoc->id_monhoc = $data['id_monhoc'];
        $giaovienmonhoc->tengiaovien = $data['tengiaovien'];
        $giaovienmonhoc->slug_giaovien = $data['slug_giaovien'];
        $giaovienmonhoc->tomtat = $data['tomtat'];
        $giaovienmonhoc->thongtin = $data['thongtin'];
        $giaovienmonhoc->kichhoat = $data['kichhoat'];


        $get_image = $request->hinhanh;
        if ($get_image) {

            $path = 'public/uploads/teachers/' . $giaovienmonhoc->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/teachers/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $giaovienmonhoc->hinhanh = $new_image;
        }
        $giaovienmonhoc->save();
        return redirect()->back()->with('status', 'Cập nhật giáo viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTeacher  $categoryTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryTeacher)
    {

        $this->AuthLogin();
        $giaovien = CategoryTeacher::find($categoryTeacher);
        $path = 'public/uploads/teachers/' . $giaovien->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        CategoryTeacher::find($categoryTeacher)->delete();
        return redirect()->back()->with('status', 'Xóa giáo viên thành công');
    }
}
