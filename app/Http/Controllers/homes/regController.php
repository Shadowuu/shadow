<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\model\user;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Session;

class regController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function doReg(Request $request)
    {
        $input = $request->except('_token');
        //return $input;
        $phone_number = $input['tel'];
        
        // $rule = [
        //     'phone_number'=>'required|between:11,11',
        //     'password'=>'required|between:6,32',
        //     'code'=>'alpha_num|between:6,6',
        // ];
        // $mess =[
        //     'phone_number.required'=>'用户名必须输入',
        //     'phone_number.between'=>'用户名必须是手机号',
        //     'password.required'=>'密码必须输入',
        //     'password.between'=>'密码必须在6-32位之间',
        //     'code.alpha_num'=>'验证码只能是字母或数字',
        // ];
        // $validator = Validator::make($input, $rule,$mess);
        // if ($validator->fails()) {
        //     return redirect('homes/register')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        $code = $input['code'];

    //3.验证码是否正确
         if(implode('',session('code')) != $code)
        {
            return redirect('/reg')->with('msg','您输入的验证码错误，请重新输入');
        }
    //判断用户名是否存在
        $user = user::where('tel',$input['tel'])->first();
        //dd($user);
        if($user != null)
        {
            return redirect('/login')->with('msg','您输入的手机号存在，请登录');
        }
    
        $pass = $input['pass'];
       //   dd($pass);
        $name = $input['nickName'];
        // dd($phone_number);

        
       $user = DB::insert('insert into user(tel, pass, nickName) values (?, ?, ?)', [$phone_number, $pass,$name]);
         // dd($user);
      // dd($user->id);
        if ($user)
        {
            session(['tel']=>$phone_number);
            return redirect('/after');
        }else
        {
            return back()->with('msg','注册失败，请重新注册');
        }
    }
}
