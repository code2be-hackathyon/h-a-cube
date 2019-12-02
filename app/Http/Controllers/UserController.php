<?php

namespace App\Http\Controllers;

use App\Etablissements;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = new \App\User;
        $user->email = Auth::user()->email;
        $user->firstname =Auth::user()->firstname;
        $user->lastname = Auth::user()->lastname;
        $user->age = Auth::user()->age;
        $user->etablissementLabel = Etablissements::where('id', Auth::user()->etablissement_id)->select('label')->get();
        $user->etablissementCity = Etablissements::where('id', Auth::user()->etablissement_id)->select('city')->get();

        return view('profile')->with('user', $user);
    }

    public function changePwd()
    {
        return view('changePwd');
    }

    public function getAll()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();


    }
}
