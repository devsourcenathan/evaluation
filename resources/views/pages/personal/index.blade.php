@extends('partials.main')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Système d'évaluation du Personnel</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered  table-hover">
        <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom(s)</th>
          <th>Prenom(s)</th>
          <th>Note</th>
          <th>Taux de Gratification</th>
         
        </tr>
        </thead>
        <tbody>
          @foreach ($personals as $personal)
            <tr>
              <td>{{$personal->matriculate}}</td>
              <td>{{$personal->name}}</td>
              <td>{{$personal->first_name}}</td>
              <td>{{$personal->note}}</td>
              <td>{{$personal->gratification}}</td>
              
            </tr>
          @endforeach
        
        </tbody>
      </table>
      
      

      

    </div>
    <!-- /.card-body -->
  </div>



  
@endsection