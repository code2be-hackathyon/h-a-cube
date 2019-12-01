<?php

namespace App\Http\Controllers;

use App\Sessions;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('frontoffice/createSession');
    }

    public function search() {
        return view('frontoffice/search');
    }

    public function show(Sessions $sessions)
    {
        return $sessions;
    }

    public function store(Request $request)
    {
        $sessions = Sessions::create($request->all());

        return response()->json($sessions, 201);
    }

    public function update(Request $request, Sessions $sessions)
    {
        $sessions->update($request->all());

        return response()->json($sessions, 200);
    }

    public function delete(Sessions $sessions)
    {
        $sessions->delete();


    }
}
