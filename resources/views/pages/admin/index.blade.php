@extends('partials.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des administrateurs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom(s)</th>
                            <th>Prenom(s)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personals as $personal)
                            <tr>
                                <td>{{ $personal->matriculate }}</td>
                                <td>{{ $personal->name }}</td>
                                <td>{{ $personal->first_name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Actions</button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-hover dropdown-icon"
                                            data-toggle="dropdown">
                                            <span class="sr-only"></span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="/admin/update/{{ $personal->id }}">Modifier</a>
                                            <a class="dropdown-item" href="/admin/delete/{{ $personal->id }}">Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>




        </div>
        <!-- /.card-body -->
    </div>
@endsection
