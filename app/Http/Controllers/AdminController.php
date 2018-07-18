<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\AdminModel;

class AdminController extends Controller
{
    function login(Request $request)
    {
    	$username = $request['username'];
    	$password = md5($request['password']);

    	$rest = AdminModel::Login($username, $password);

    	if (is_int($rest)) {
            //create seassion
            session(['iduser' => $rest]);
            //
            echo "success";
    	} else {
    		echo "failed";
    	}
    }
    function logout()
    {
    	session()->forget('iduser');
        //return redirect()->guest(url('/'));
        return redirect('/');
    }
}
