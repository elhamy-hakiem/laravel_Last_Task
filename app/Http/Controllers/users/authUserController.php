<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class authUserController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }


    public function doLogin(Request $request)
    {

        $data = $this->validate($request,[
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);



        // Auth :: attempt() is a method that checks if the user is authenticated.
        // If the user is authenticated, it will return true.
        // If the user is not authenticated, it will return false.
        //auth()->guard('student')->attempt($data)

        if(auth()->attempt($data)){

            return redirect(url('Tasks'));
        }else{

            session()->flash('Message-error', "Invalid Credentials");

            return back();

        }

    }



    public function Logout(){

            auth()->logout();

            return redirect(url('Login'));
    }

}
