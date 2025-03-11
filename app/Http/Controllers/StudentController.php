<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'name' => 'required|max:255'
        ]));
        $student = new Student();
        $student->name = $request->input('name');
        $student->name = $request->input('birthdate');
        $student->name = $request->input('grade');
        $student->save();

        return response($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if($student){
            return $student;
        } else {
            return response(null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(([
            'name' => 'required|max:255'
        ]));
        $studentToUpdate = Student::find($id);
        $studentToUpdate->name = $request->input('name');
        $studentToUpdate->birthdate = $request->input('birthdate');
        $studentToUpdate->grade = $request->input('grade');
        $studentToUpdate->save();

        return response($studentToUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if($student){
          $student->delete(); 
          return response("Student Deleted Sucessfully", 200);
        } else {
            return response(null, 404);
        }
    }
}
