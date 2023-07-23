@extends('partials.main')

@section('content')


      <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Formulaire d'inscription d'un evaluateurs'</h3>
    </div>
    <form action="/avaluator" method="POST">
      @csrf
    <!-- /.card-header -->
    <div class="card-body">
      
      
      <div class="form-group">
        <label for="exampleInputRounded0">Matricule </label>
        <input type="text" name="matriculate" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Matricule">
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Nom(s) </label>
        <input type="text" name="name" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Nom(s)">
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Prenom(s)</label>
        <input type="text" name="first_name" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Prenom(s)">
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Email</label>
        <input name="email" type="mail" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Email">
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Mot de passe</label>
        <input name="password" type="password" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Mot de passe" autocomplete="false">
      </div>


      <div class="row">

        <button type="submit" class="btn btn-block btn-outline-primary col-5">Enregistrer</button>
        <button type="reset" class="btn btn-block btn-outline-danger col-5 offset-2">Annuler</button>
      </div>
      

    </div>
  </form>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


@endsection