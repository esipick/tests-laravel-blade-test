<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class FormController extends Controller
{
    public function form1(Request $request){
        $array = [
            'apiId' => '52696FFFECA44C068F2EE48A2D76D323',
            'apiPassword' => 'b8e4ff389',
            'testMode' => '1',
            'productId' => '197',
            'price' => '0',
            'email' => $request->input('Email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'firstName' => $request->input('First_Name'),
            'lastName' => $request->input('Last_Name'),
            'cpap'  => $request->input('cpap'),
            'cancer' => 'test',    
            
        ];
        $response = Http::withoutVerifying()->post('/https://leads-inst286-client.phonexa.com/lead/', $array);
        if($response->successful()){
            $res = $response->object();
             return View::make('form_res', ['lead_id' => $res->lead_id]);
        }            
        return View::make('error', ['error' => '']);

    }
    public function form2(Request $request){
        $array = [
            'apiId' => '745E04DD7B5B401E800DC89C488860C4',
            'apiPassword' => '3c93735',
            'testMode' => '1',
            'productId' => '196',
            'price' => '15',
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'criteria1'  => $request->input('criteria1'),
            'criteria2'  => $request->input('criteria2'),
            'criteria3'  => $request->input('criteria3'),
            'state'  => $request->input('state'),
            
        ];
        $response = Http::withoutVerifying()->post('/https://leads-inst286-client.phonexa.com/lead/', $array);
        if($response->successful()){
            $res = $response->object();
             return View::make('form_res', ['lead_id' => $res->lead_id]);
        }            
        return View::make('error', ['error' => '']);

    }
}
