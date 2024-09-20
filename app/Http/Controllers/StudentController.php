<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index()
    {
      $students = Student::all();
      
      return $students;
        
    }

    function show($nis)
    {
      $students= Student::where('nis', $nis)->get();
      
      return $students;

        
    }

    function create(Request $request)
    {
      //validasi
      $validated = $request->validate([
        'name'=>['required'],
        'nis'=>['required', 'numeric'],
        'grade'=>['required'],
        'gender'=>['required'],
        'age'=>['required'],
      ]);
      //save database
      $student = new Student;
      $student->name = $validated['name'];
      $student->nis = $validated['nis'];
      $student->grade = $validated['grade'];
      $student-> gender = $validated['gender'];
      $student->age = $validated['age'];
      $student->save();
      //return data
      return $student;

        
    }

    function update(Request $request,$id)
    {
      $validated = $request->validate([
        'name'=>['required'],
        'nis'=>['required', 'numeric'],
        'grade'=>['required'],
        'gender'=>['required'],
        'age'=>['required'],
      ]);
      $student = Student::find($id);
      $student->update($validated);
      $student->save();

      return $student;

        
    }

    function destroy($id)
    {
      $student = Student::find($id);
      $student->delete();

      return $student;

        
    }
}
