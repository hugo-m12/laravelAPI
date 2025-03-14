<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllcourses()
    {
        return Course::all();
    }

    /**
     * Display the specified resource.
     */
    public function getCoursesById(string $id)
    {
        $course = Course::find($id);
        if($course){
            return $course;
        } else {
            return response(null, 404);
        }
    }
}
