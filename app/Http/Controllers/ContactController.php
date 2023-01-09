<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Statistical;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class ContactController extends Controller
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
        $dangky = contact::orderBy('id', 'DESC')->where('trangthai',0)->get();
        return view('admin.contact.contact')->with(compact('dangky'));
    }
    public function unactive($contact)
    {
        $this->AuthLogin();
        //$dangky = contact::orderBy('id', 'DESC')->get();
        $unactive = DB::table('contacts')->where('id', $contact)->update(['trangthai' => 1]);
        return redirect()->back()->with('status', 'Thay đổi trạng thái thành công');
    }

    public function active($contact)
    {
        $this->AuthLogin();

        //$dangky = contact::orderBy('id', 'DESC')->get();
        $active = DB::table('contacts')->where('id', $contact)->update(['trangthai' => 0]);
        return redirect()->back()->with('status', 'Thay đổi trạng thái thành công');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function dalienhe()
    {
        $this->AuthLogin();
        $thongtin= contact::orderBy('id', 'DESC')->where('trangthai',1)->get();
        return view('admin.contact.dalienhe')->with(compact('thongtin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact)
    {

        $this->AuthLogin();
        contact::find($contact)->delete();
        return redirect()->back()->with('status', 'Xóa học sinh đăng ký thành công');
    }
}
