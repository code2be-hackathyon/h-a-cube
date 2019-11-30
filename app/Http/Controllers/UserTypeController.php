<?php

namespace App\Http\Controllers;

use App\UserTypes;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index()
    {
        return UserTypes::all();
    }

    public function show(UserTypes $userType)
    {
        return $userType;
    }

    public function store(Request $request)
    {
        $userType = UserTypes::create($request->all());

        return response()->json($userType, 201);
    }

    public function update(Request $request, UserTypes $userType)
    {
        $userType->update($request->all());

        return response()->json($userType, 200);
    }

    public function delete(UserTypes $userType)
    {
        $userType->delete();


    }
}
