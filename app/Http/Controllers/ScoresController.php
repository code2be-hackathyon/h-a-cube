<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Scores;
use App\Studentpools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoresController extends Controller
{
    public function index()
    {
        return Scores::all();
    }

    public function show(Scores $scores)
    {
        return $scores;
    }

    public function store(Request $request)
    {
        $scores = Scores::create($request->all());

        return response()->json($scores, 201);
    }

    public function update(Request $request, Scores $scores)
    {
        $scores->update($request->all());

        return response()->json($scores, 200);
    }

    public function delete(Scores $scores)
    {
        $scores->delete();
    }

    public function vote(Request $request)
    {
        $homeController = new HomeController;
        Studentpools::where('session_id', $request->id)->where('user_id', Auth::user()->id)->update(['note' => $request->note]);
        return $homeController->index();
    }
}
