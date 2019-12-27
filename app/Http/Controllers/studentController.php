<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class studentController extends Controller
{
    public function insertStudent(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|max:60|min:5',
        'email' => 'required|email|unique:students',
        'phone' => 'required|numeric|unique:students',
        ]);

        $student = new Student;
        $student ->name = $request->name;
        $student ->email = $request->email;
        $student ->phone = $request->phone;
        $student -> save();

        if($student){
            $notification=array(
                'messege' => 'Successfully Student Inserted',
                'alert-type' => 'success'
            );
            return Redirect()-> back()->with($notification);
        }else{
            $notification=array(
                'messege' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return Redirect()-> back()->with($notification);
        }
    }

    public function showStudents(){
        $students = Student::all();
        return view('student.students',compact('students'));
    }

    public function viewStudent($id){
        $view = Student::findorfail($id);
        return view('student.view',compact('view'));
    }

    public function editStudent($id){
        $student = Student::findorfail($id);
        return view('student.edit',compact('student'));
    }

    public function updateStudent(Request $request, $id){
        $validatedData = $request->validate([
        'name' => 'required|max:60|min:5',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        ]);
        $student = Student::findorfail($id);
        $student ->name = $request->name;
        $student ->email = $request->email;
        $student ->phone = $request->phone;
        $student -> save();

        if($student){
            $notification=array(
                'messege' => 'Successfully Student Updated',
                'alert-type' => 'success'
            );
            return Redirect()-> back()->with($notification);
        }
    }

    public function deleteStudent($id){
        $student = Student::findorfail($id);
        $delete = $student->delete();

        if($delete){
            $notification=array(
                'messege' => 'Successfully Student Deleted',
                'alert-type' => 'danger'
            );
            return Redirect()-> back()->with($notification);
        }
    }
}
