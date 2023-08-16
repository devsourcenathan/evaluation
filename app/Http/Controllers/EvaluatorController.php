<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EvaluatorController extends Controller
{
    function index()
    {
        $personals = User::where("type", "evaluator")->where('status', 'active')->get();
        return view('pages.evaluator.index', compact('personals'));
    }

    function create()
    {
        return view('pages.evaluator.create');
    }

    function store(Request $request)
    {
        $personal = new User();
        $personal->name = $request->name;
        $personal->first_name = $request->first_name;
        $personal->matriculate = $request->matriculate;
        $personal->email = $request->email;
        $personal->password = Hash::make($request->password);
        $personal->type = "evaluator";

        $personal->save();

        return redirect('/evaluator')->with('success', 'L\'evaluateur a bien été créé');
    }
}
