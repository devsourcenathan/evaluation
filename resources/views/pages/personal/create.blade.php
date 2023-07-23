@extends('partials.main')

@section('content')


      <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Formulaire d'inscription du Personnel</h3>
    </div>
    <form action="/personal" method="POST">
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
        <label for="exampleSelectRounded0">Grade</label>
        <select name="grade" required class="custom-select rounded-0" id="exampleSelectRounded0">
          <option>AES</option>
          <option>AEM</option>
          <option>ASG</option>
        </select>
      </div>
      
      
      <div class="form-group">
        <label for="exampleSelectRounded0">Catégorie</label>
        <select name="categorie" required class="custom-select rounded-0" id="exampleSelectRounded0">
          <option> </option>
          <option> 1</option>
          <option> 2</option>
          <option> 3</option>
          <option> 4</option>
          <option> 5</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Note Actuelle</label>
        <input name="note" type="number" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Note de base de l'Agent">
      </div>

      <div class="form-group">
        <label for="exampleInputRounded0">Taux de Gratification Actuelle</label>
        <input name="gratification" type="number" required class="form-control rounded-0" id="exampleInputRounded0" placeholder="Taux de Gratification Actuelle en %">
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