<?php

namespace App\Http\Controllers;

use App\Models\CategorySubject;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class CategorySubjectController extends Controller
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
        $danhmucmonhoc = CategorySubject::orderBy('id', 'DESC')->get();
        return view('admin.categorysubject.index')->with(compact('danhmucmonhoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.categorysubject.create');
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

                'tenmonhoc' => 'required|unique:category_subjects|max:255',
                'slug_monhoc' => 'required',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',


            ],
            [
                'tenmonhoc.unique' => 'Tên môn học đã có.Vui lòng điền tên khác',
                'tenmonhoc.max' => 'Tên môn học không vượt quá 255 ký tự',
                'tenmonhoc.required' => 'Bạn phải điền tên danh mục môn học',
                'slug_monhoc.required' => 'Bạn phải điền slug danh mục môn học',
                'mota.required' => 'Bạn phải điền mô tả danh mục môn học'

            ]
        );
        $danhmucmonhoc = new CategorySubject();
        $danhmucmonhoc->tenmonhoc = $data['tenmonhoc'];
        $danhmucmonhoc->slug_monhoc = $data['slug_monhoc'];
        $danhmucmonhoc->mota = $data['mota'];
        $danhmucmonhoc->kichhoat = $data['kichhoat'];
        $danhmucmonhoc->save();
        return redirect()->back()->with('status', 'Thêm danh mục môn học thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySubject $categorySubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function edit($categorySubject)
    {
        $this->AuthLogin();

        $danhmucmonhoc = CategorySubject::find($categorySubject);

        return view('admin.categorysubject.edit')->with(compact('danhmucmonhoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorySubject)
    {
        $this->AuthLogin();

        $data = $request->validate(
            [

                'tenmonhoc' => 'required|max:255|unique:category_subjects,tenmonhoc,'.$categorySubject,
                'slug_monhoc' => 'required',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',


            ],
            [
                'tenmonhoc.unique' => 'Tên môn học đã có.Vui lòng điền tên khác',
                'tenmonhoc.max' => 'Tên môn học không vượt quá 255 ký tự',
                'tenmonhoc.required' => 'Bạn phải điền tên danh mục môn học',
                'slug_monhoc.required' => 'Bạn phải điền slug danh mục môn học',
                'mota.required' => 'Bạn phải điền mô tả danh mục môn học'

            ]
        );
        $danhmucmonhoc = CategorySubject::find($categorySubject);
        $danhmucmonhoc->tenmonhoc = $data['tenmonhoc'];
        $danhmucmonhoc->slug_monhoc = $data['slug_monhoc'];
        $danhmucmonhoc->mota = $data['mota'];
        $danhmucmonhoc->kichhoat = $data['kichhoat'];
        $danhmucmonhoc->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục môn học thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorySubject  $categorySubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorySubject)
    {
        $this->AuthLogin();

        CategorySubject::find($categorySubject)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục môn học thành công');
    }
}
