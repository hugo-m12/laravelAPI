<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:sanctum');

/*Route::get('/students', function (){

$students = [
    'class' => 'Flag Backend 2025',
   'members' => [
       'Gabriel', 
        'Hugo',
        'Pedro',
        'Carlos'
       ]
];

return $students;

});*/

/*Route::get('/students', function (){
        return Student::all();
    });*/

Route::apiResource('/students', StudentController::class);
Route::apiResource('/teachers', TeacherController::class);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::post('/enrollments', [EnrollmentController::class, 'store']);
Route::get('/enrollments/{student_id}', [EnrollmentController::class, 'showByStudentId']);
Route::delete('/enrollments/{student_id}/{course_id}', [EnrollmentController::class, 'destroy']);
