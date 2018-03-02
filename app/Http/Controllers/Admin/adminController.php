<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\admins;
use Session;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //数据分页
        $admins = admins::paginate(2);
        return view('Admin/admin/adminList', compact('admins'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/admin/adminAdd');
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

        // 将数据添加到数据库
        $data = admins::insert($res);

        // 数据添加成功返回页面
         if($data){
             return redirect('admin/admin');
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
    public function show()
    {
        $admins = admins::all();
        return view('Admin/admin/admin', compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($aid)
    {
        $res = admins::where('aid',$aid)->first();
        
        return view('/Admin/admin/adminEdit',compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $aid)
    {
        // 接收从页面发送的新值
        $res= $request->except('_token','_method');

        // // 创建时间戳
        // $res['time']=time();

        //条件判断当前修改ID与新传的值ID一致更新数据库对应内容
        $data = admins::where('aid',$aid)->update($res);

        if ($data) {

            //更新成功后返回列表页面
            return redirect('/admin/admin/');
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
    public function destroy($aid)
    {
        // dd($aid);
        // 条件判断当前ID与页面要删除的值ID一致删除对应ID数据
        $data = admins::where('aid',$aid)->delete();
        return $data;
        
    }
}
