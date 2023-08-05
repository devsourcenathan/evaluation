<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Systeme d'évaluation du Personnel</title>
    <!-- General CSS Files -->
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
</head>

<body>
    {{-- <div class="loader"></div> --}}
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>


                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm">
                                <img alt="image" src="{{ asset('assets/img/avatar.jpg') }}" class="">
                                <i class="avatar-presence online"></i>
                            </figure>

                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Salut, {{ Auth::user()->name }}</div>
                            {{-- <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i>
                                Profile
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                    Se deconnecter
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo1.png') }}"
                                class="header-logo" />
                            <span class="logo-name">Evaluation</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        @if (Auth::user()->role == 'personal')
                            <li class="dropdown active">
                                <a href="index.html" class="nav-link">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role !== 'personal')
                            <li class="{{ request()->is('/') ? 'dropdown active' : 'dropdown' }}">
                                <a href="/" class="nav-link">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('evaluation') ? 'dropdown active' : 'dropdown' }}">
                                <a href="/evaluation" class="nav-link">
                                    <i data-feather="grid"></i>
                                    <span>Evaluation</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('personal') ? 'dropdown active' : 'dropdown' }}">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="layout"></i><span>Personnel</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="/personal/create">Ajouter un personnel</a></li>
                                    <li><a class="nav-link" href="/personal">Liste du personnel</a></li>
                                </ul>
                            </li>

                            <li class="{{ request()->is('evaluator') ? 'dropdown active' : 'dropdown' }}">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="command"></i><span>Evaluateurs</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="/evaluator/create">Ajouter un evaluateur</a></li>
                                    <li><a class="nav-link" href="/evaluator">Liste des evaluateurs</a></li>
                                </ul>
                            </li>

                            <li class="{{ request()->is('admin') ? 'dropdown active' : 'dropdown' }}">
                                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="user-check"></i><span>Administrateurs</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="/admin/create">Ajouter un administrateur</a></li>
                                    <li><a class="nav-link" href="/admin">Liste des administrateurs</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </aside>
            </div>
