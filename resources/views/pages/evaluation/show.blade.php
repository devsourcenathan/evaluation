@extends('partials.main')
@php
    use App\Models\User;
    use Carbon\Carbon;
@endphp
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/evaluation" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-arrow-alt-circle-left
            "></i> Retour</a>
            &nbsp;&nbsp;
            <h3 class="card-title">Liste des evaluations de <b>{{ $user->name }} {{ $user->first_name }}</b> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3 class="card-title"></h3>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Note</th>
                            <th>Taux de Gratification</th>
                            <th>Evaluateur</th>
                            <th>Atteinte des objectifs</th>
                            <th>Respect des valeurs</th>
                            <th>Incidences des retards et des absences</th>
                            <th>Incidence des sanctions</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluations as $evaluation)
                            @php
                                $evaluator = User::where('id', $evaluation->id_evaluator)->first();
                                $sanctions = unserialize($evaluation->sanctions);
                            @endphp
                            <tr class="text-align: center">
                                <td>{{ $evaluation->note }}</td>
                                <td>{{ $evaluation->taux }} %</td>
                                <td>{{ $evaluator->name ?? '-' }}</td>
                                <td>{{ $evaluation->objectifs ?? 'Pas d\'incidence' }}</td>
                                <td>{{ $evaluation->respects ?? 'Pas d\'incidence' }}</td>
                                <td>{{ $evaluation->incidences ?? 'Pas d\'incidence' }}</td>
                                <td>
                                    @forelse ($sanctions as $item)
                                        {{ ucwords(str_replace('_', ' ', $item)) }}
                                        <br>
                                    @empty
                                        -
                                    @endforelse
                                </td>
                                <td style="text-transform: capitalize">
                                    {{ ucwords(Carbon::parse($evaluation->created_at)->locale('fr_FR')->isoFormat('MMM Y')) }}
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
