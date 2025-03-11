<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Teacher::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'name' => 'required|max:255'
        ]));
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->name = $request->input('subject');
        $teacher->save();

        return response($teacher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return $teacher;
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
        $teacherToUpdate = Teacher::find($id);
        $teacherToUpdate->name = $request->input('name');
        $teacherToUpdate->subject = $request->input('subject');
        $teacherToUpdate->save();

        return response($teacherToUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
          $teacher->delete(); 
          return response("Teacher deleted Successfully", 200);
        } else {
            return response(null, 404);
        }
    }
}
