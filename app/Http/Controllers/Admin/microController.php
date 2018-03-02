<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\mblog;
use App\Http\Model\user_cont;
use App\Http\Model\report;
use App\Http\Model\cmt_list;
use App\Http\Model\gods_list;
use App\Http\Model\forward_list;

class microController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $mblog = mblog::paginate(5);
        
        if($request->input('search') !== null){
            $search = mblog::join('user_cont', 'mblog.mid', '=', 'user_cont.uid')

            ->Where('user_cont','like','%'.$request->input('search').'%')

            ->Where('mblog','like','%'.$request->input('search').'%')

            ->paginate(5);

        }
        // $search = mblog::join('user_cont', 'mblog.mid', '=', 'user_cont.uid')->select();

        // $resd = contents::join('user_info','contents.uid','=','user_info.uid')

        // ->Where('label','like','%'.$request->input('select').'%')

        // ->Where('content','like','%'.$request->input('content').'%')

        // ->paginate(10); 

        return view('Admin/micro/microList', compact('mblog'));
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
}
