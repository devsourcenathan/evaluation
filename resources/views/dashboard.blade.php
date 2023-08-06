@extends('partials.main')

@section('content')
    @php
        use App\Models\User;
        use Carbon\Carbon;
    @endphp
    <section class="section">
        @if (Auth::user()->type !== 'personal')
            <div class="row ">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Evaluations</h5>
                                            <h2 class="mb-3 font-18">{{ $evaluations_count }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/1.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"> Personnels</h5>
                                            <h2 class="mb-3 font-18">{{ $personals }}</h2>
                                            {{-- <p class="mb-0"><span class="col-orange">09%</span> Decrease</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Administrateur</h5>
                                            <h2 class="mb-3 font-18">{{ $admins }}</h2>
                                            {{-- <p class="mb-0"><span class="col-green">42%</span> Increase</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets/img/banner/4.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->type === 'personal')
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 style="text-transform: uppercase !important; font-weight: bold">
                                        {{ Auth::user()->name }}
                                        {{ Auth::user()->first_name }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Note</th>
                                                    <th>Taux de gratification</th>
                                                    <th>Evaluateur</th>
                                                    <th>Atteinte des objectifs</th>
                                                    <th>Respect des valeurs</th>
                                                    <th>Incidence des retards et absences</th>
                                                    <th>Incidence de la sanction sur l'evaluation generale</th>
                                                    <th>Date</th>
                                                    <th></th>
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
                                                        <td>{{ Carbon::parse($evaluation->created_at)->locale('fr_FR')->isoFormat('MMM Y') }}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary"
                                                                href="/evaluation/{{ $personal->id }}">Revaluer</a>

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </section>
@endsection
