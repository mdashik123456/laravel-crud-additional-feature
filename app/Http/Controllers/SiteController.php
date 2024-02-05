<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class SiteController extends Controller
{
    //
    public  function index() {
        $emps = employee::all();
        $data = compact('emps');
        return view('index')->with($data);
    }
    public  function updatePage($id) {
        $emp = employee::find($id);
        if(is_null($emp)){
            return redirect(url('/'));
        }
        $data = compact ('emp', 'id');
        return view('updatePage')->with($data);
    }

    public function update($id, Request $req){
        $emp = employee::find($id);
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
        $emp = new employee();
        
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
        $del = employee::find($id);
        if($del != null){
            $del->delete();
        }
        return redirect(url('/'));
    }
    
    
    public function trashPage(){
        $emps = employee::onlyTrashed()->get();
        $data = compact('emps');
        return view('trashPage')->with($data);
    }
    
    public function trashPageDelete($id){ 
        //Permanent Delete
        $del = employee::onlyTrashed()->find($id);
        if($del != null){
            $del->forceDelete();
        }
        return redirect()->back();
    }
    public function trashPageRestore($id){
        $restore = employee::onlyTrashed()->find($id);
        if($restore != null){
            $restore->restore();
        }
        return redirect()->back();
    }
}
