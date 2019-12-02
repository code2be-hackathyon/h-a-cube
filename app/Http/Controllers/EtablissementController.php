<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etablissements;

class EtablissementController extends Controller
{
    public function index()
    {
        return Etablissements::all();
    }

    public function show(Etablissements $etablissement)
    {
        return $etablissement;
    }

    public function store(Request $request)
    {
        $etablissement = Etablissements::create($request->all());

        return response()->json($etablissement, 201);
    }

    public function update(Request $request, Etablissements $etablissement)
    {
        $etablissement->update($request->all());

        return response()->json($etablissement, 200);
    }

    public function delete(Etablissements $etablissement)
    {
        $etablissement->delete();


    }
}
