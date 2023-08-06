@extends('partials.main')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <a href="/admin" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-alt-circle-left
        "></i>
                Retour</a>
            &nbsp;&nbsp;
            <h3 class="card-title">Formulaire de modification d'un administrateur</h3>
        </div>
        <form action="/admin/update_store" method="post">
            @csrf
            @method('post')
            <!-- /.card-header -->
            <div class="card-body">

                <input type="hidden" name="id" value="{{ $personal->id }}">

                <div class="form-group">
                    <label for="exampleInputRounded0">Matricule </label>
                    <input type="text" name="matriculate" value="{{ $personal->matriculate }}" required
                        class="form-control rounded-0" id="exampleInputRounded0" placeholder="Matricule">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Nom(s) </label>
                    <input type="text" name="name" value="{{ $personal->name }}" required
                        class="form-control rounded-0" id="exampleInputRounded0" placeholder="Nom(s)">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Prenom(s)</label>
                    <input type="text" name="first_name" value="{{ $personal->first_name }}" required
                        class="form-control rounded-0" id="exampleInputRounded0" placeholder="Prenom(s)">
                </div>

                {{-- <div class="form-group">
                    <label for="exampleInputRounded0">Email</label>
                    <input name="email" type="mail" value="{{ $personal->email }}" required class="form-control rounded-0" id="exampleInputRounded0"
                        placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="exampleInputRounded0">Mot de passe</label>
                    <input name="password" type="password" required class="form-control rounded-0" id="exampleInputRounded0"
                        placeholder="Mot de passe" autocomplete="false">
                </div> --}}


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
