@extends('partials.main')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulaire de modification du Personnel</h3>
        </div>
        <form action="/personal/update" method="POST">
            @csrf
            @method('POST')
            <!-- /.card-header -->
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $personal->id }}">


                <div class="form-group">
                    <label for="exampleInputRounded0">Matricule </label>
                    <input type="text" name="matriculate" class="form-control rounded-0"
                        value="{{ $personal->matriculate }}" id="exampleInputRounded0" placeholder="Matricule">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Nom(s) </label>
                    <input type="text" name="name" class="form-control rounded-0" value="{{ $personal->name }}"
                        id="exampleInputRounded0" placeholder="Nom(s)">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Prenom(s)</label>
                    <input type="text" name="first_name" class="form-control rounded-0"
                        value="{{ $personal->first_name }}" id="exampleInputRounded0" placeholder="Prenom(s)">
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Grade</label>
                    <select name="grade" class="custom-select rounded-0" id="exampleSelectRounded0">
                        <option>AES</option>
                        <option>AEM</option>
                        <option>ASG</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="exampleSelectRounded0">Catégorie</label>
                    <select name="categorie" class="custom-select rounded-0" id="exampleSelectRounded0">
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Email</label>
                    <input name="email" type="mail" class="form-control rounded-0" id="exampleInputRounded0"
                        value="{{ $personal->email }}" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Mot de passe</label>
                    <input name="password" type="password" class="form-control rounded-0" id="exampleInputRounded0"
                        placeholder="Mot de passe" autocomplete="false">
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
