<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home.login');
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
        //echo 111;
        //获取登录信息
        // dd($request);
        $res = $request->except('_token');

        session(['uinfo'=>$res]);
        
        //将信息存入闪存
        // $request->flashExcept('_token');
        
        //
        //查询登录人信息
        $user = user::where('tel',$res['tel'])->first();

        // dd($user);

        //判断用户名是存在
        if(!empty($user)){
            if($user['pass'] == $res['pass']){
                session(['uid'=>$user->uid]);
                return redirect('/after');
            }else{

                return back()->with('msg','密码错误,请重新输入！');

            }
            
        }else{

            return back()->with('msg','此用户不存在！');

        }
        // 验证验证码
        if(Session('code') != $res['code']){

            return back()->with('msg','验证码不正确！');

        }
        
        
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

    public function a(Request $request)
    {
        //echo 111;
        //获取登录信息
        // dd($request);
        $res = $request->except('_token');

        session(['uinfo'=>$res]);
        
        //将信息存入闪存
        // $request->flashExcept('_token');
        
        //
        //查询登录人信息
        $user = user::where('tel',$res['tel'])->first();

        // dd($user);

        //判断用户名是存在
        if(!empty($user)){
            if($user['pass'] == $res['pass']){
                session(['tel'=>$user->tel]);
                return redirect('/after');
            }else{

                return back()->with('msg','密码错误,请重新输入！');

            }
            
        }else{

            return back()->with('msg','此用户不存在！');

        }
        // 验证验证码
        if(Session('code') != $res['code']){

            return back()->with('msg','验证码不正确！');

        }
    }
}
