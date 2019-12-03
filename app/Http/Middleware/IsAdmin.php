<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $etablissement = new \App\Etablissements();
//        $etablissement->label = 'Lycée notre Dame du Roc';
//        $etablissement->address = 'Test adresse';
//        $etablissement->city = 'La Roche sur Yon';
//        $etablissement->zipCode = '85000';
//        $etablissement->save();
//        $usertype = new \App\Usertypes();
//        $usertype->label = 'admin';
//        $usertype->save();
//        $user = new \App\User();
//        $user->password = Hash::make('pwsio');
//        $user->email = 'usersio@sio.fr';
//        $user->firstname = 'usersio';
//        $user->lastname = 'ndduroc';
//        $user->age = 18;
//        $user->etablissement_id = 1;
//        $user->phone = '0682394037';
//        $user->usertype_id = 1;
//        $user->isAllowedToCreateCourse = 1;
//        $user->save();

        if (Auth::check()) {
            if (Auth::user()->usertype_id == 1) {
                return $next($request);
            }
            return response()->view('error_401', [], 401);
        } else {
            return response()->view('auth/login');
        }
    }
}
