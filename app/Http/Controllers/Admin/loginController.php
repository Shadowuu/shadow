<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Session;
use App\Http\Model\admins;


class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/login/login');
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
        //获取登录信息
        $res = $request->except('_token');;
        //将信息存入闪存
        // $request->flashExcept('_token');

        //查询登录人信息
        $admins = admins::where('name',$res['name'])->first();
        //判断用户名是存在
        if(!isset($admins)){
            return back()->with('msg','用户名或密码不正确！');
        }
        //验证验证码
        if(Session('code') != $res['code']){
            return back()->with('msg','验证码不正确！');
        }
        session(['aid'=>$admins->aid]);
        return redirect('admin/index');
    }

    public function code()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        
        header('Content-type: image/jpeg');
        $builder->output();

        session(['code' => $builder->getPhrase()]);
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
}
