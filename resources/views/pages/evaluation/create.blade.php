@extends('partials.main')

@section('content')

      <!-- general form elements -->
  <form action="/evaluation" method="POST">
        @csrf
        <input type="hidden" name="id_user" value="{{$id}}" >
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulaire d'evaluation du Personnel</h3>
        </div>
    
    <!-- /.card-header -->
        <div class="card-body">
          <div class="card-success">    
              <div class="card-header" >
                <label><h4 >Incidence de des retards et des absences </h4> </label>   
              </div><br>
                          
              <div class="row">
                <div class="col-md-5"><label>Retards/ Repos  Médicaux/ hospitalisations / Évacuation sanitaire</label><br><br>
                
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary1" name="retards" value="02_01">
                    <label for="radioPrimary1">
                      02 réductions ou 1 suppression de la prime d'assiduité
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary2" name="retards" value="03_04_02">
                    <label for="radioPrimary2">Entre 03 et 04 réductions ou 02 suppression de la prime d'assiduité
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary3" name="retards" value="05_03">
                    <label for="radioPrimary3">A partir de 05 réductions ou 03 suppression de la prime d'assiduité
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary4" name="retards" value="01_10">
                    <label for="radioPrimary4">Absence justifiée pour maladie de 01 à 10 jours
                    </label>
                  </div>
                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary5" name="retards" value="11_20">
                    <label for="radioPrimary5">Absence justifiée pour maladie de 11 à 20 jours
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary6" name="retards" value="_20">
                    <label for="radioPrimary6">Absence justifiée pour maladie de de plus de 20 jours
                    </label>
                  </div>
                
                </div>


                <div class="col-md-4"><label> Atteinte des objectifs </label>
                
                  <br/><br/>
                  <div class="icheck-primary d-inline">
                    <input type="radio" checked id="cha" name="objectifs" value="majeure">
                    <label for="cha">Pas d'incidence
                    </label>
                  </div>
                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="objectif3" name="objectifs" value="mineure">
                    <label for="objectif3">Atteinte d'une mineure partie des objectifs
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="objectif5" name="objectifs" value="majeure">
                    <label for="objectif5">Atteinte d'une majeure partie des objectifs
                    </label>
                  </div>
                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="objectif6" name="objectifs" value="ensemble">
                    <label for="objectif6">Atteinte de l'ensemble des objectifs
                    </label>
                  </div>
                </div>


                <div class="col-md-3"><label> Comportement </label><br><br>

                  <div class="icheck-primary d-inline">
                    <input type="radio" checked id="ch0" name="comportement" value="rien">
                    <label for="ch0">Pas d'incidence
                    </label>
                  </div>

                  <br/><br/>

                  <div class="icheck-primary d-inline">
                    <input type="radio" checked id="ch7" name="comportement" value="rien">
                    <label for="ch7">Comportement modele
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="ch8" name="comportement" value="conforme">
                    <label for="ch8">Comportement conforme
                    </label>
                  </div>

                  <br><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="ch9" name="comportement" value="juste">
                    <label for="ch9">Comportement juste conforme
                    </label>
                  </div>

                
                </div>
              </div>

          </div>
          <br><br>
        </div>
    </div>

    <div class="card-success"  >
      <div class="card-header" >
        <h4 >Incidence de la  sanction sur l'evaluation generale </h4>
      </div>
    <br>



      <label>  Sanctions </label><br><br>
      
      <div class="icheck-primary d-inline">
        <input type="checkbox" id="1" name="sanctions[]" value="avertissement">
        <label for="1">Avertissement</label>
      </div>
      <br><br>
      <div class="icheck-primary d-inline">
        <input type="checkbox" id="3" name="sanctions[]" value="blame">
        <label for="3">Blame </label>
      </div>

      <br><br>
      <div class="icheck-primary d-inline">
        <input type="checkbox" id="4" name="sanctions[]" value="mise_a_pieds">
          <label for="4">Mise a pied</label>
      </div>

      <br><br>
      <div class="icheck-primary d-inline">
        <input type="checkbox" id="w" name="sanctions[]" value="sanction_2_degre">
        <label for="w">sanction de 2eme degre(retard a l'avancement, retrogradation)</label>
      </div>
    </div>
   <div class="row">

        <button type="submit" class="btn btn-block btn-outline-primary col-5">Enregistrer</button>
        <button type="reset" class="btn btn-block btn-outline-danger col-5 offset-2">Annuler</button>
    </div>
      
<br><br>
    </div>
  </form>


@endsection