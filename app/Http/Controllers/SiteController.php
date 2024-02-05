<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class SiteController extends Controller
{
    //
    public  function index(Request $req) {
        $search = $req['search'] ?? "";
         if($search == ""){
            $emps = Employees::all();
         }else{
            $emps = Employees::where('name', "LIKE", "%$search%")->orWhere('email', "LIKE", "%$search%")->orWhere('id', "LIKE", "%$search%")->get();
         }

        $data = compact('emps', 'search');
        return view('index')->with($data);
    }
    public  function updatePage($id) {
        $emp = Employees::find($id);
        if(is_null($emp)){
            return redirect(url('/'));
        }
        $data = compact ('emp', 'id');
        return view('updatePage')->with($data);
    }

    public function update($id, Request $req){
        $emp = Employees::find($id);
        if(is_null($emp)){
            return redirect(url('/'));
        }
        $emp->name = $req['name'];
        $emp->email = $req['email'];
        $emp->age = $req['age'];
        $emp->gender = $req['gender'];
        $emp->dob = $req['dob'];
        $emp->about_user = $req['about_user'];
        
        $emp->save();

        return redirect(url('/'));
    }

    public  function insert(Request $req) {
        $emp = new Employees();
        
        $emp->name = $req['name'];
        $emp->email = $req['email'];
        $emp->age = $req['age'];
        $emp->gender = $req['gender'];
        $emp->dob = $req['dob'];
        $emp->about_user = $req['about_user'];

        //image uploading code starts here
        $fileName = $req['email'] . "." .$req->file('emp_pic')->extension();
        $emp->emp_pic = $fileName;
        $req->file('emp_pic')->storeAs('public/uploads', $fileName);

        $emp->save();
        return redirect(url('/'));
    }

    public function delete($id){
        $del = Employees::find($id);

        if($del != null){
            $del->delete();
        }
        return redirect(url('/'));
    }
    
    
    public function trashPage(){
        $emps = Employees::onlyTrashed()->get();
        $data = compact('emps');
        return view('trashPage')->with($data);
    }
    
    public function trashPageDelete($id){ 
        //Permanent Delete
        $del = Employees::onlyTrashed()->find($id);
        if($del != null){
            unlink(storage_path("app/public/uploads/" . $del->emp_pic));
            $del->forceDelete();
        }
        return redirect()->back();
    }
    public function trashPageRestore($id){
        $restore = Employees::onlyTrashed()->find($id);
        if($restore != null){
            $restore->restore();
        }
        return redirect()->back();
    }
}
