<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use App\Models\Users;
use DataTables;


class VisitorController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('visitor');
    }

    public function fetah_all(Request $req){
        if($req->ajax()){
            $query = Visitor::join('users' , 'users.id' , '=' , 'visitors.visitor_enter_by');
            if(Auth::user()->type == 'User'){
                $query->where('visitors.visitor_enter_by' , '=' , Auth::user->id);
            }
            $data = $query->get(['visitors.visitor_name' , 'visitors.visitor_meet_person_name' , 'visitors.visitor_department' , 'visitors.visitor_enter_time','visitors.visitor_out_time' , 'visitors.visitor_status' , 'visitors.id' , 'users.name']);

            return DataTables::of($data)->addIndexColumn()
                ->editColumn('visitor' , function($row){
                    if ($row->visitor_status == 'In') {
                            return '<span class="badge bg-success">In</span>';
                    }else{
                        return '<span class="badge bg-danger">Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action' , function($row){
                    if ($row->visitor_status == 'In') {
                        return '<a href="/visitor/view/'.$row->id.'" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/edit'.$row->id.'" class=""btn btn-primary btn-sm >Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'" >Delete</button>';
                    } else {
                        return '<a href="/visitor/view/'.$row->id.'" class="btn btn-info btn-sm">View</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'" >Delete</button>';
                    }
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
