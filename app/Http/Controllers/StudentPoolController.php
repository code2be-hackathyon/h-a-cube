<?php

namespace App\Http\Controllers;

use App\Studentpools;
use Illuminate\Http\Request;

class StudentPoolController extends Controller
{
    public function index()
    {
        return Studentpools::all();
    }

    public function show(Studentpools $studentpools)
    {
        return $studentpools;
    }

    public function store(Request $request)
    {
        $studentpools = Studentpools::create($request->all());

        return response()->json($studentpools, 201);
    }

    public function update(Request $request, Studentpools $studentpools)
    {
        $studentpools->update($request->all());

        return response()->json($studentpools, 200);
    }

    public function delete(Studentpools $studentpools)
    {
        $studentpools->delete();


    }
}
