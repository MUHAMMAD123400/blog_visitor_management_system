<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Hash;

class SubUserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function sub_user(){
        return view('sub_user');
    }

    public function fetchall(Request $req){
        if($req->ajax()){
            $data = User::where('type' , '=' , 'User')->get();
            return DataTables::of($data)
            ->addColumn('action' , function($row){
                return '<a href="/sub_user/edit/'.$row->id.'" class="btn-sm btn btn btn-info">Edit</a>
               <button type="button" class="delete btn-sm btn btn btn-danger" data-id="'.$row->id.'">Del</button> ';
            })
            ->rawColumns(['action'])
        ->make(true);
    }

        return view('sub_user');
    }

    public function add(){
        return view('add_sub_user');
    }

    public function add_validation(Request $req){
        $req->validate([
            "name" => "required",
            "email" => "required | email | unique:users",
            "password" => "required | min:2",
        ]);

        $data = $req->all();
        User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => hash::make($data['password']),
            "type" => "User"
        ]);
        return redirect('sub_user')->with('success' , 'New User Added');
    }

    public function edit($id){
        $data = User::findOrFail($id);

        return view('edit_sub_user' , compact('data'));
    }

    public function edit_validation(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required | email',
        ]);

        $data = $req->all();

        if (!empty($data['password'])) {
                $form_data = array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => hash::make($data['password']),
                );
        }else{
            $form_data = array(
                'name' => $data['name'],
                'email' => $data['email']
            );
        }

        User::whereId($data['hidden_id'])->update($form_data);
        return redirect('sub_user')->with('success' , 'User Data Update');
    }

    public function delete($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success' , 'User Data Removed');
    }
}
