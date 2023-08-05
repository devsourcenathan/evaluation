@extends('partials.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des administrateurs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom(s)</th>
                        <th>Prenom(s)</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($personals as $personal)
                        <tr>
                            <td>{{ $personal->matriculate }}</td>
                            <td>{{ $personal->name }}</td>
                            <td>{{ $personal->first_name }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>





        </div>
        <!-- /.card-body -->
    </div>
@endsection
