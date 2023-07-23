<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    function index()
    {
        $personals = User::where("type", "personal")->get();
        return view('pages.personal.index', compact('personals'));
    }

    function evaluation()
    {
        $personals = User::where("type", "personal")->get();
        return view('pages.evaluation.index', compact('personals'));
    }

    function register_evaluate(Request $request)
    {

        $personal = User::find($request->id_user);

        $note = $personal->note;
        $graduation = $personal->gratification;

        $values = "caa";
        $comportement = $request->comportement;
        $objectifs = $request->objectifs;

        if ($comportement === 'juste' && $objectifs === 'mineure') {
            $values = 'caa';
            $note -= 0.5;
            $graduation -= 5;
        }

        if ($comportement === 'conforme' && $objectifs === 'mineure') {
            $values = 'caa+';
            $note -= 0.25;
            $graduation -= 5;
        }

        if ($comportement === 'rien' && $objectifs === 'mineure') {
            $values = 'cco-';
            $note = $note;
        }

        if ($comportement === 'juste' && $objectifs === 'majeure') {
            $values = 'cco';
            $note = $note;
        }

        if ($comportement === 'conforme' && $objectifs === 'majeure') {
            $values = 'cco+';
            $note = $note;
            $graduation += 5;
        }

        if ($comportement === 'rien' && $objectifs === 'majeure') {
            $values = 'csu';
            $note += 0.25;
            $graduation += 5;
        }

        if ($comportement === 'juste' && $objectifs === 'ensemble') {
            $values = 'csu+';
            $note += 0.5;
            $graduation += 5;
        }

        if ($comportement === 'conforme' && $objectifs === 'ensemble') {
            $values = 'cee';
            $note += 0.75;
            $graduation += 10;
        }

        if ($comportement === 'juste' && $objectifs === 'ensemble') {
            $values = 'rien';
            $note += 1;
            $graduation += 10;
        }


        if (isset($request->sanctions)) {
            foreach ($request->sanctions as $sanction) {
                if ($sanction === "avertissement") {
                    $note -= 1;
                    $graduation -= 10;
                } else if ($sanction === "blame") {
                    $note -= 1.5;
                    $graduation -= 15;
                } else if ($sanction === "mise_a_pieds") {
                    $note -= 2;
                    $graduation -= 20;
                } else {
                    $note -= 4;
                    $graduation -= 40;
                }
            }
        }

        $personal->note = $note;
        $personal->gratification = $graduation;
        $personal->id_evaluator = Auth::user()->id;

        $personal->save();
        return redirect('/evaluation');
    }

    function evaluate($id)
    {
        return view('pages.evaluation.create', compact('id'));
    }

    function create()
    {
        return view('pages.personal.create');
    }

    function store(Request $request)
    {
        $personal = new User();
        $personal->name = $request->name;
        $personal->first_name = $request->first_name;
        $personal->matriculate = $request->matriculate;
        $personal->note = $request->note;
        $personal->gratification = $request->gratification;
        $personal->grade = $request->grade;
        $personal->categorie = $request->categorie;
        $personal->email = $request->email;
        $personal->password = Hash::make($request->password);

        $personal->save();

        return redirect('/personal');
    }
}
