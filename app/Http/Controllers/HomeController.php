<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Sessions;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allSessions = Sessions::all();
        foreach($allSessions as $item) {
            $item->course_id = Courses::where('id', $item->course_id)->select('label')->get();
            $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
        }

        return view('home')->with('allSessions_guest', $allSessions);
    }
}
