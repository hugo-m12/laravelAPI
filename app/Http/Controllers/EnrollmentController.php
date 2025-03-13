<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;

//todo check if course and student models are needed


class EnrollmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'course_id' => 'required|exists:courses,id'
            ]);
        } catch (Exception $error) {
            return response(null, 400);
        }

        $enrollment = new Enrollment();
        $enrollment->student_id = $request->input('student_id');
        $enrollment->course_id = $request->input('course_id');

        $enrollment->save();

        return [
            "message" => "Student enrolled successfully"
        ];
    }

    /**
     * Display the specified resource.
     */
    public function showByStudentId(string $student_id)
    {
        $student = Student::find($student_id);
    
        $enrollments = $student->enrollments;

        $resultEnrollments = [];

        foreach ($enrollments as $enrollment) {
            $resultEnrollments[] = $enrollment->course;
        }


        $result = [
            'student' => $student,
            'enrollments' => $resultEnrollments,
        ];

        return $result;
    }

    public function destroy (string $student_id, string $course_id)
    {
        $student = Student::find($student_id);

        $course = Student::find($course_id);

        $enrollments = $student->enrollments;

        if($enrollments) {
            Enrollment::destroy($student_id, $course_id);
            return response(["message" => "Student unenrolled successfully"], 200);
        }
        else {
            return response(null, 404);
        }
    } //todo fix delete
}
