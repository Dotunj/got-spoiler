<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Dingo\Api\Http\FormRequest;
use Illuminate\Http\Request;
use App\Number;

class NumberController extends Controller
{
	use Helpers;

    public function index()
    {
    	$number = Number::all();

    	return response()->json([
            'data'=>$number, 
            'status'=>200,
        ]);
    }
    
    public function store(Request $request)
    {
    	$number = new Number;

        $this->validate($request, [ 
          'phone_no'=>'required|unique:numbers',
            ]);
    	$number->phone_no = $request->phone_no;

    	if($number->save()) {
             return response()->json([
            'success'=>'stored', 
            'status'=>200,
        ]);
    	} else {
    		return response()->json([
            'error'=>'could not store', 
            'status'=>500,
        ]);
    	}
    }

    public function test()
    {
    	return response()->json([
            'success'=>'it works', 
            'status'=>200,
        ]);
    }

}
