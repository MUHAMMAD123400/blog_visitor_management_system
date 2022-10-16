<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(){
        $data = User::findOrFail(Auth::User()->id);
        return view('profile' , compact('data'));
    }

    public function edit_validation(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email'
        ]);
        $data = $request->all();

        if ($request->password == $request->confirm_password) {

            if(!empty($data['password'])){
                $form_data = array(
                    "name" => $data['name'],
                    "email" => $data['email'],
                    "password" => hash::make( $data['password']),
                );
            }else{
                $form_data = array(
                    "name" => $data['name'],
                    "email" => $data['email'],
                );
            }
            User::whereId(Auth::user()->id)->update($form_data);
            return redirect('profile')->with('success' , 'Profile Data Updated'); 
        }else{
            return redirect('profile')->with('error' , 'Password Should be match'); 
        }
    }
}
