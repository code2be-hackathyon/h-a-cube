<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Sessions;
use App\Studentpools;
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
        $sessionToVote = $this->checkPastSessions();
        $sessionsForUser = new Sessions();
        $tags = [];
        $dataFromTags = [];
        $dataFromDate = Sessions::where('date', (date('Y-m-d ')))->get();
        $dataFromSession = Sessions::where('isAccepted' , 0)->get();

        if (Auth::check()) {
            // Les sessions auxquelles l'user connecté est inscrit
            $studentPoolForUser = Studentpools::where('user_id', Auth::user()->id)->where('note', null)->select('session_id')->first();
            $sessionsForUser = Sessions::where('id', $studentPoolForUser->session_id)->where('date', '>', date('Y-m-d'))->get();
            foreach ($sessionsForUser as $item) {
                $item->courses_id = Courses::where('id', $item->courses_id)->select('label')->get();
                $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
            }
            foreach ($dataFromDate as $session){
                $session->courses_id = Courses::where('id', $session->courses_id)->select('label')->get();
                $session->user_id = User::where('id', $session->user_id)->select('firstname')->get();
            }
            foreach ($dataFromSession as $session){
                $session->courses_id = Courses::where('id', $session->courses_id)->select('label')->get();
                $session->user_id = User::where('id', $session->user_id)->select('firstname')->get();
            }
            $tagsForUser = UserTags::where('user_id', Auth::user()->id);
            foreach ($tagsForUser as $tag) {
                array_push($tags, Arr::random($tagsForUser));
            }
            foreach ($tags as $tag) {
                array_push($dataFromTags, Sessions::where('courses_id', $tag->course_id));
            }
            foreach ($dataFromTags as $session) {
                $session->courses_id = Courses::where('id', $session->courses_id)->select('label')->get();
                $session->user_id = User::where('id', $session->user_id)->select('firstname', 'lastname')->get();
            }
        }

        $allSessions = Sessions::all();
        foreach ($allSessions as $item) {
            $item->courses_id = Courses::where('id', $item->courses_id)->select('label')->get();
            $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
        }
        $data = ['allSessions_guest' => $allSessions, 'sessionsForUser' => $sessionsForUser, 'dataFromTags' => $dataFromTags, 'sessionToVote' => $sessionToVote, 'dataFromDate' => $dataFromDate , 'dataFromSession' => $dataFromSession];
        return view('home')->with($data);
    }

    private function checkPastSessions()
    {

        if (Auth::check()) {
            $studentVote = Studentpools::where('user_id', Auth::user()->id)->where('note', null)->get();
            if (!$studentVote->isEmpty()) {
                $sessionToVote = Sessions::where('id', $studentVote[0]->session_id)->where('date', '<', date('Y-m-d'))->get();
                foreach ($sessionToVote as $session) {
                    $session->courses_id = Courses::where('id', $session->courses_id)->select('label')->get();
                    $session->user_id = User::where('id', $session->user_id)->select('firstname', 'lastname')->get();
                    return $sessionToVote;
                }
            }

        }
        return '';

    }
}
