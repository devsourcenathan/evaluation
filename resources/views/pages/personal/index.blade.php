@extends('partials.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Système d'évaluation du Personnel</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom(s)</th>
                        <th>Prenom(s)</th>
                        <th>Note</th>
                        <th>Taux de Gratification</th>
                        <th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($personals as $personal)
                        <tr>
                            <td>{{ $personal->matriculate }}</td>
                            <td>{{ $personal->name }}</td>
                            <td>{{ $personal->first_name }}</td>
                            <td>{{ $personal->note }}</td>
                            <td>{{ $personal->gratification }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Actions</button>
                                    <button type="button"
                                        class="btn btn-primary dropdown-toggle dropdown-hover dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="/evaluation/{{ $personal->id }}">Evaluer</a>
                                        <a class="dropdown-item" href="/personal/{{ $personal->id }}">Modifier</a>
                                    </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>





        </div>
        <!-- /.card-body -->
    </div>
@endsection
