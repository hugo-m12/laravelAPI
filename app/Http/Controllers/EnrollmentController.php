<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;

//todo check if course and student models are needed


class EnrollmentController extends Controller
{

    public function index()
    {
        return Enrollment::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $student = new Enrollment();
        $student->save();

        return response("Student enrolled Sucessfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        {
            $enrollment = Enrollment::find($id);
            if($enrollment){
                return $enrollment;
            } else {
                return response(null, 404);
            }
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->delete();
            return response("Student unenrolled Sucessfully", 200);
        } else {
            return response(null, 404);
        }
    }
}
