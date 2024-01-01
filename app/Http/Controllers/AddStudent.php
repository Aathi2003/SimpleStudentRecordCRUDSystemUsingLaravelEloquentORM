<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Studentdb;
use Illuminate\Support\Facades\File;
class AddStudent extends Controller
{
   // public $warning="the user is already exists";
    //public $success="New Student Record is Added Successfully";

    public static function store(Request $req){
        $name=$req->input('name');
        $age=$req->input('age');
        $mobile=$req->input('mobile');
        $email=$req->input('email');
        $address=$req->input('address');

        //check data
                 //check email
        $checkem=Studentdb::where('email',$email)->first();
                  //check mobile
        $checkph=Studentdb::where('mobile',$mobile)->first();

        if($checkem || $checkph){
            return redirect()->back()->with('warn','The record is already exists');
        }

        //image upload

        $fileName = time() . '.' . $req->image->extension();
        $req->image->move(public_path('picture'), $fileName);

        //store data

        $data = Studentdb::create([
            'name' => $name,
            'age' => $age,
            'mobile' => $mobile,
            'email' => $email,
            'address' => $address,
            'image' => $fileName,

        ]);

        $data->save();

        return redirect()->back()->with('done','New Student is Added Successfully');


    }


    public static function show(Request $req){

        $alldata=Studentdb::paginate(4);

        return view('layout.Stu_Service_Views.view_student',['alldatas'=>$alldata]);

    }

    public static function getdata(Request $req){

        if($req->ajax()){

            $email=$req->input('mail');
            $sgldata=Studentdb::where('email',$email)->first();
            return response()->json(['data'=> $sgldata]);

        }

    }

    public function update(Request $req) {
        $getdatas=Studentdb::where('email',$req->email)->first();
        $getdatas->name=$req->name;
        $getdatas->age=$req->age;
        $getdatas->mobile=$req->mobile;
        $getdatas->address=$req->address;

        //delete already image

        File::delete(public_path("picture\\{$getdatas->image}"));

        //image upload
         $fileName = time() . '.' . $req->image->extension();
         $req->image->move(public_path('picture'), $fileName);

         $getdatas->image=$fileName;

         $getdatas->save();

         return response()->json(['success' => 'Record Modified Successfully Please Refresh the Page to See Modifications','err' => null]);

    }

    public static function remove(Request $req){
        $email=$req->input('email');
        $student=Studentdb::where('email',$email)->first();
        File::delete(public_path("picture\\{$student->image}"));
        $student->delete();
       return redirect('/view')->with('delete','Record deleted successfully');
    }

    public static function view(Request $req){
        $profile=Studentdb::where('email',$req->email)->first();
        return view('layout.view_prof',['view_data' => $profile]);
    }
}
