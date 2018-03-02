<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Http\Model\link;

class linkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据库link表所有内容
        $res = link::paginate(4);
        // dd($res);

        return view('Admin/link/linkList',compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/link/linkAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收页面传过来的数据除了令牌
        $res = $request->except('_token');


        // 添加时间戳
        $res['time']=time();

        // 将数据添加到数据库
        $data = link::insert($res);

        // 数据添加成功返回页面
         if($data){
             return redirect('admin/link');
         } else {
             return back();
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
    public function edit($lid)
    {
        // 从notice表查到要修改的数据
        $res = link::where('lid',$lid)->first();
        return view('/Admin/link/linkEdit',compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lid)
    {
        // 接收从页面发送的新值
        $res= $request->except('_token','_method');

        // 创建时间戳
        $res['time']=time();

        //条件判断当前修改ID与新传的值ID一致更新数据库对应内容
        $data = link::where('lid',$lid)->update($res);

        if ($data) {

            //更新成功后返回列表页面
            return redirect('/admin/link/');
        } else {

            //不成功则返回修改页面
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lid)
    {
        // 条件判断当前ID与页面要删除的值ID一致删除对应ID数据
        $data = link::where('lid',$lid)->delete();

        return $data;
    }
}
