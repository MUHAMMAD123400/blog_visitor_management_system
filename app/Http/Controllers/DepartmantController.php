<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use DataTables;
use Illuminate\Support\Facades\Auth;

class DepartmantController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('department');
    }

    public function fetch_all(Request $req){
        if($req->ajax()){
            $data = Department::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action' , function($row){
                    return '<a href="/department/edit/'.$row->id.'" class="btn btn-primary btn-sm" >Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'" >Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('department');
    }

    public function add(){
        return view('add_department');
    }

    public function add_validation(Request $req){
        $req->validate([
            'department_name' => 'required',
            'contact_person' => 'required'
        ]);

        $data = $req->all();

        Department::create([
            'department_name' => $data['department_name'],
            'contact_person' => implode("," ,$data['contact_person'])
        ]);

        return redirect('department')->with('success' , 'Now Department Added');
    }

    public function edit($id){
        $data = Department::findOrFail($id);
        return view('edit_department' , compact('data'));
    }

    public function edit_validation(Request $req){
        $req->validate([
            "department_name" => "required",        
            "contact_person" => "required",        
        ]);

        $data = $req->all();

        $form_data = array(
            'department_name' => $data['department_name'],
            'contact_person' =>  implode(", " , $data['contact_person'])
        );
        // return $form_data;
        Department::whereId($data['hidden_id'])->update($form_data);
        return redirect('department')->with('success' , 'Department Data updated');
    }

    public function delete($id){
        $data = Department::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success' , 'Department Data Removed');
    }
}
