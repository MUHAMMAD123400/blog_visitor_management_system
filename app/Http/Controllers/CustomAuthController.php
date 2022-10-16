<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use App\Models\User;

class CustomAuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function regitertation(){
        return view('auth.register');
    }

    public function custom_regitertation(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required | email | unique:users",
            "password" => "required | min:2",
            "confirm_password" => "required | min:2",
        ]);

        if($request->password == $request->confirm_password){
            $data = $request->all();
            User::create([
                "name" => $data['name'],
                "email" => $data['email'],
                "password" => hash::make($data['password']),
                "type" => "Admin",
            ]);
            return redirect('regitertation')->with('success' , 'Registration Complete');
        }
        else{
            return redirect('regitertation')->with('error' , 'Password should be match');
        }
    }

    public function custom_login(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $cridential = $request->only('email' , 'password');
        if (Auth::attempt($cridential)) {
            return redirect()->intended('index')->withSuccess('login');
        }
        return redirect()->route('login')->with('error' , 'Login details in not Valid');
    }
    
    public function index(){
        if (Auth::check()) {
            return view('index');
        }
        else{
            return view('login');
        }
    }

    public function logout(){
        session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
