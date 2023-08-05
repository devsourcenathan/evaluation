<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
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

    function show($id)
    {
        $personal = User::find($id);


        return view('pages.personal.show', compact('personal'));
    }

    function update(Request $request)
    {
        $personal = User::find($request->id);
        $personal->name = $request->name;
        $personal->first_name = $request->first_name;
        $personal->matriculate = $request->matriculate;
        $personal->note = $request->note;
        $personal->gratification = $request->gratification;
        if (isset($request->grade)) {
            $personal->grade = $request->grade;
        }

        if (isset($request->categorie)) {
            $personal->categorie = $request->categorie;
        }
        $personal->email = $request->email;

        if (isset($request->password)) {
            $personal->password = Hash::make($request->password);
        }

        $personal->save();

        return redirect('/personal')->with('success', 'Le personnel a bien été modifié');
    }

    function evaluation()
    {
        $evaluations = Evaluation::all();
        return view('pages.evaluation.index', compact('evaluations'));
    }

    function register_evaluate(Request $request)
    {
        $evaluation = new Evaluation();
        $evaluation->id_personal = $request->id_user;
        $evaluation->id_evaluator = Auth::user()->id;


        $personal = User::find($request->id_user);

        $note = $personal->note;
        $graduation = $personal->gratification;

        $values = "caa";
        $comportement = $request->comportement;
        $objectifs = $request->objectifs;
        $respect = "";
        if (!isset($request->comportement_2)) {
            $respect = $request->comportement;
            if ($comportement === 'juste' && $objectifs === 'mineure') {
                $values = 'caa';
                $note -= 0.5;
                $graduation -= 5;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement juste comforme";
            }

            if ($comportement === 'conforme' && $objectifs === 'mineure') {
                $values = 'caa+';
                $note -= 0.25;
                $graduation -= 5;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement conforme";
            }

            if ($comportement === 'rien' && $objectifs === 'mineure') {
                $values = 'cco-';
                $note = $note;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement juste modele";
            }

            if ($comportement === 'juste' && $objectifs === 'majeure') {
                $values = 'cco';
                $note = $note;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($comportement === 'conforme' && $objectifs === 'majeure') {
                $values = 'cco+';
                $note = $note;
                $graduation += 5;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($comportement === 'rien' && $objectifs === 'majeure') {
                $values = 'csu';
                $note += 0.25;
                $graduation += 5;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($comportement === 'juste' && $objectifs === 'ensemble') {
                $values = 'csu+';
                $note += 0.5;
                $graduation += 5;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement juste comforme";
            }

            if ($comportement === 'conforme' && $objectifs === 'ensemble') {
                $values = 'cee';
                $note += 0.75;
                $graduation += 10;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement comforme";
            }

            if ($comportement === 'juste' && $objectifs === 'ensemble') {
                $values = 'rien';
                $note += 1;
                $graduation += 10;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement modele";
            }
        } else {
            $respect = $request->comportement_2;
            if ($request->comportement_2 === 'caa') {
                $values = 'caa';
                $note -= 0.5;
                $graduation -= 5;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement juste comforme";
            }

            if ($request->comportement_2 === 'caa+') {
                $values = 'caa+';
                $note -= 0.25;
                $graduation -= 5;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement conforme";
            }

            if ($request->comportement_2 === 'cco-') {
                $values = 'cco-';
                $note = $note;
                $objectifs = "Atteinte d'une mineure partie des objectifs";
                $respect = "Comportement juste modele";
            }

            if ($request->comportement_2 === 'cco') {
                $values = 'cco';
                $note = $note;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($request->comportement_2 === 'cco+') {
                $values = 'cco+';
                $note = $note;
                $graduation += 5;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($request->comportement_2 == 'csu') {
                $values = 'csu';
                $note += 0.25;
                $graduation += 5;
                $objectifs = "Atteinte d'une majeure partie des objectifs";
                $respect = "Comportement comforme";
            }

            if ($request->comportement_2 === 'csu+') {
                $values = 'csu+';
                $note += 0.5;
                $graduation += 5;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement juste comforme";
            }

            if ($request->comportement_2 === 'cee') {
                $values = 'cee';
                $note += 0.75;
                $graduation += 10;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement comforme";
            }

            if ($request->comportement_2 === 'cee+') {
                $values = 'rien';
                $note += 1;
                $graduation += 10;
                $objectifs = "Atteinte de l'ensemble des objectifs";
                $respect = "Comportement modele";
            }
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

        $evaluation->note = $note;
        $evaluation->taux = $graduation;
        $evaluation->objectifs = $objectifs ?? "-";
        $evaluation->respects = $respect ?? "-";
        $evaluation->incidences = $request->retards ?? "-";
        $evaluation->sanctions = serialize($request->sanctions ?? []);
        // $sanctions = unserialize($evaluation->sanctions);

        $evaluation->save();
        $personal->save();
        return redirect('/evaluation')->with('success', 'Le personnel a bien été evalué');
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

        return redirect('/personal')->with('success', 'Le personnel a bien été créé');
    }
}
