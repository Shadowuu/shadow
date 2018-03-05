<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\user;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Session;


class zhuceController extends Controller
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

    public function SMS(Request $request)
    {
        $tel = $request->input('phone');
         $code  = ['code' => rand(100000, 999999)];
        session()->put('code', $code);

        $config = [
            'accessKeyId'    => 'LTAIfcvvg2eNQ9wu',
            'accessKeySecret' => 'sGOXV2zRLbeSdl5Dn8S1nlXcQIDi47',
        ];

        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($tel);
        $sendSms->setSignName('Feeder尚');
        $sendSms->setTemplateCode('SMS_123798536');
        $sendSms->setTemplateParam($code);
        // $sendSms->setOutId('demo');

        // return $phone;
        
        print_r($client->execute($sendSms));
        var_dump($tel);

    }
}
