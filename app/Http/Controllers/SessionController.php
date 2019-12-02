<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Sessions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {
        return view('frontoffice/createSession');
    }

    public function search()
    {
        return view('frontoffice/search');
    }

    public function showSessionList()
    {
        $data = Sessions::all();
        foreach ($data as $item) {
            $item->user_id = User::where('id', $item->user_id)->select('firstname', 'lastname')->get();
            $item->courses_id = Courses::where('id', $item->courses_id)->select('label')->get();
        }
        return view('backoffice/sessionList')->with('data', $data);
    }

    public function showSessionDetails(Request $request)
    {
        $session_id = $request->id;
        $data = Sessions::where('id', $session_id)->get();
        return view('backoffice/sessionDetails')->with('data', $data[0]);
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

    public function update(Request $request)
    {
        Sessions::where('id', $request->id)->update(['room' => $request->room]);
        return $this->showSessionList();
    }

    public function delete(Sessions $sessions)
    {
        $sessions->delete();


    }

    public function insert()
    {
        $course_label = $_POST['course_id'];
        $title = $_POST['title'];
        $date = date('Y-m-d',strtotime($_POST['date']));
        $startedHour = $_POST['startedHour'];
        $endedHour = $_POST['endedHour'];
        $description = $_POST['description'];
        $nbMaxUsers = $_POST['nbMaxUsers'];
        $difficulty = $_POST['difficulty'];

        $course_id = DB::table('courses')->select('id')->where('label','=',$course_label)->get();

        DB::table('sessions')->insert(
            ['courses_id' => $course_id[0]->id,'title' => $title,'date'=>$date,'startedHour' => $startedHour,'endedHour' => $endedHour,'description' => $description,'nbMaxUsers'=>$nbMaxUsers,'difficulty'=>$difficulty]
        );

        return view('frontoffice/createSession');

    }
}
