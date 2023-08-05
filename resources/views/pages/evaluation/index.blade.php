@extends('partials.main')
@php

    use App\Models\User;
@endphp
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
                        <th>Evaluateur</th>
                        <th>Atteinte des objectifs</th>
                        <th>Respect des valeurs</th>
                        <th>Incidences des retards et des absences</th>
                        <th>Incidence des sanctions</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluations as $evaluation)
                        @php
                            $evaluator = User::where('id', $evaluation->id_evaluator)->first();
                            $personal = User::where('id', $evaluation->id_personal)->first();
                            $sanctions = unserialize($evaluation->sanctions);
                        @endphp
                        <tr class="text-align: center">
                            <td>{{ $personal->matriculate }}</td>
                            <td>{{ $personal->name }}</td>
                            <td>{{ $personal->first_name }}</td>
                            <td>{{ $evaluation->note }}</td>
                            <td>{{ $evaluation->taux }} %</td>
                            <td>{{ $evaluator->name ?? '-' }}</td>
                            <td>{{ $evaluation->objectifs ?? 'Pas d\'incidence' }}</td>
                            <td>{{ $evaluation->respects ?? 'Pas d\'incidence' }}</td>
                            <td>{{ $evaluation->incidences ?? 'Pas d\'incidence' }}</td>
                            <td>
                                @forelse ($sanctions as $item)
                                    {{ $item }}
                                @empty
                                    Pas d'incidence
                                @endforelse
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/evaluation/{{ $personal->id }}">Revaluer</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>





        </div>
        <!-- /.card-body -->
    </div>
@endsection
