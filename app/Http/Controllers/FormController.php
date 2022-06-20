<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public $error = 'error occured while posting data to server';

    public function form1(Request $request){
        $validator = Validator::make($request->all(), [
            'Email' => 'required',
            'phoneNumber' => 'required',
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'cpap' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', 'Required Fields are missing!');
        }
        $array = [
            'apiId' => env('apiId1'),
            'apiPassword' => env('apiPassword1'),
            'testMode' => env('testMode'),
            'productId' => env('productId1'),
            'price' => env('price1'),    
            'email' => $request->input('Email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'firstName' => $request->input('First_Name'),
            'lastName' => $request->input('Last_Name'),
            'cpap'  => $request->input('cpap'),
            'cancer' => env('cancer1'),    
            
        ];
        $response = Http::post(env('API_URL'), $array);
        if($response->successful()){
            $res = $response->object();
             return View::make('form_res', ['lead_id' => $res->lead_id]);
        }            
        return View::make('error', ['error' => '']);

    }
    public function form2(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'phoneNumber' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'criteria1' => 'required',
            'criteria2' => 'required',
            'criteria3' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', 'Required Fields are missing!');
        }
        $array = [
            'apiId' => env('apiId2'),
            'apiPassword' => env('apiPassword2'),
            'testMode' => env('testMode'),
            'productId' => env('productId2'),
            'price' => env('price2'),  
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'criteria1'  => $request->input('criteria1'),
            'criteria2'  => $request->input('criteria2'),
            'criteria3'  => $request->input('criteria3'),
            'state'  => $request->input('state'),
            
        ];
        $response = Http::post(env('API_URL'), $array);
        if($response->successful()){
            $res = $response->object();
             return View::make('form_res', ['lead_id' => $res->lead_id]);
        }            
        return View::make('error', ['error' => $error]);

    }
   
}
