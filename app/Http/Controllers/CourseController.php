<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Courses::all();
    }

    public function show(Courses $course)
    {
        return $course;
    }

    public function store(Request $request)
    {
        $course = Courses::create($request->all());

        return response()->json($course, 201);
    }

    public function update(Request $request, Courses $course)
    {
        $course->update($request->all());

        return response()->json($course, 200);
    }

    public function delete(Courses $course)
    {
        $course->delete();


    }
}
