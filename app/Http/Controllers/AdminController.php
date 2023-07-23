<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        $personals = User::where("type", "admin")->get();
        return view('pages.admin.index', compact('personals'));
    }

    function create()
    {
        return view('pages.admin.create');
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

        return redirect('/admin');
    }
}
