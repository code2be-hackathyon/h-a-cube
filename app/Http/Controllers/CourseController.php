<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index()
    {
        return view('frontoffice/newCourse');
    }

    public function send()
    {
        $label = $_POST['courseValue'];
        $description = $_POST['courseDescription'];

        DB::table('courses')->insert(
            ['label' => $label, 'description' => $description]
        );
        return view('frontoffice/newCourse');
    }

    public function themePage()
    {
        $data = Courses::where('isAccepted', 0);
        return view('backoffice/themePage')->with('data', $data);
    }

    public function acceptTheme(Request $request)
    {
        Courses::where('id', $request->id)->update(['isAccepted' => 1]);
        return view('home');
    }

    public function refuseTheme(Request $request)
    {
        Courses::where('id', $request->id)->update(['isAccepted' => 2]);
    }

    public function getAll()
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
