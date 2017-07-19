<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Number;

class NumberController extends Controller
{
	use Helpers;

    public function index()
    {
    	$number = Number::all();

    	return $number;
    }
    
    public function store(Request $request)
    {
    	$number = new Number;

    	$number->phone_no = $request->phone_no;

    	if($number->save()) {
             return $this->response->created();
    	} else {
    		return $this->response->errorBadRequest();
    	}
    }

    public function test()
    {
    	return "test";
    }

}
