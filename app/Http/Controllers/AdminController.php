<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        $personals = User::where("type", "=", "admin")->where('status', 'active')->get();
        return view('pages.admin.index', compact('personals'));
    }

    function create()
    {
        return view('pages.admin.create');
    }

    function update_form($id)
    {
        $personal = User::find($id);
        return view('pages.admin.update', compact('personal'));
    }

    function update(Request $request)
    {
        $personal = User::find($request->id);
        $personal->name = $request->name ?? $personal->name;
        $personal->first_name = $request->first_name ?? $personal->first_name;
        $personal->matriculate = $request->matriculate ?? $personal->matriculate;

        $personal->save();

        return redirect('/admin')->with("success", "L'admin a ete modifie");
    }
    function destroy($id)
    {
        //I want to destroy a user with her id
        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with("success", "L'admin a ete supprime");
    }

    function store(Request $request)
    {
        $personal = new User();
        $personal->name = $request->name;
        $personal->first_name = $request->first_name;
        $personal->matriculate = $request->matriculate;
        $personal->email = $request->email;
        $personal->password = Hash::make($request->password);
        $personal->type = "admin";

        $personal->save();

        return redirect('/admin')->with("success", "L'admin a ete ajoute");
    }
}
