<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Sessions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $sessionsForUser = new \App\Sessions();

        if (Auth::check()) {
            $sessionsForUser = Sessions::where('id', Auth::user()->id);
            foreach($sessionsForUser as $item) {
                $item->course_id = Courses::where('id', $item->course_id)->select('label')->get();
                $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
            }
        }

        $allSessions = Sessions::all();
        foreach($allSessions as $item) {
            $item->course_id = Courses::where('id', $item->course_id)->select('label')->get();
            $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
        }
        $data = ['allSessions_guest' => $allSessions, 'sessionsForUser' => $sessionsForUser];
        return view('home')->with($data);
    }
}
