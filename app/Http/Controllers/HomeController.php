<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Sessions;
use App\User;
use App\UserTags;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;

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
        $sessionsForUser = new Sessions();
        $tags = [];
        $dataFromTags = [];

        if (Auth::check()) {
            $sessionsForUser = Sessions::where('id', Auth::user()->id);
            foreach($sessionsForUser as $item) {
                $item->course_id = Courses::where('id', $item->course_id)->select('label')->get();
                $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
            }
            $tagsForUser = UserTags::where('user_id', Auth::user()->id);
            foreach($tagsForUser as $tag) {
                array_push($tags, Arr::random($tagsForUser));
            }
            // TODO test with real data
            foreach($tags as $tag) {
                array_push($dataFromTags, Sessions::where('course_id', $tag->course_id));
            }
            foreach($dataFromTags as $session) {
                $session->course_id = Courses::where('id', $session->course_id)->select('label')->get();
                $session->user_id = User::where('id', $session->user_id)->select('firstname', 'lastname')->get();
            }
        }

        $allSessions = Sessions::all();
        foreach($allSessions as $item) {
            $item->course_id = Courses::where('id', $item->course_id)->select('label')->get();
            $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
        }
        $data = ['allSessions_guest' => $allSessions, 'sessionsForUser' => $sessionsForUser, 'dataFromTags' => $dataFromTags];
        return view('home')->with($data);
    }
}
