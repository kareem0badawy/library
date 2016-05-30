<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;


class socialController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest');
    }

    public function getSocialAuth($provider=null)
    {
    	if (!config("services.$provider")) {
    		abort('404');
    	}
    }
}
