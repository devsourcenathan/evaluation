@extends('partials.main')

@section('content')
    <style>
        .selected {
            background-color: rgb(183, 183, 155) !important;
        }
    </style>

    <form action="/evaluation" method="POST">
        @csrf
        <input type="hidden" name="id_user" value="{{ $id }}">
        <div class="card">
            <div class="card-header">
                <a href="/evaluation" class="btn btn-icon icon-left btn-primary"><i
                        class="fas fa-arrow-alt-circle-left
                    "></i> Retour</a>
                &nbsp;&nbsp;
                <h4 style="text-align: center; font-size: 28px">Formulaire d'evaluation du Personnel</h4>
            </div>
            <div class="card-body">
                <div class="section-title mt-0" style="font-weight: bold; font-size: 20px">Elements de base de l'evaluation
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th scope="col" rowspan="2">Atteinte des objectifs</th>
                        <th scope="col" colspan="3" style="text-align: center">Respect des valeurs (Comportement)</th>
                    </tr>
                    <tr>
                        <th scope="col">Juste conforme</th>
                        <th scope="col">Conforme</th>
                        <th scope="col">Modèle</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="objectif_2" value="juste" style="display: none;">Atteinte d'une
                                mineure partie des objectifs</td>
                            <td><input type="radio" name="comportement_2" value="caa"
                                    style="display: none;">Contribution à
                                améliorer (CAA)</td>
                            <td><input type="radio" name="comportement_2" value="caa+"
                                    style="display: none;">Contribution à
                                améliorer<sup>+</sup> (CAA<sup>+</sup>)</td>
                            <td><input type="radio" name="comportement_2" value="cco-"
                                    style="display: none;">Contribution
                                Correcte<sup>-</sup> (CCO<sup>-</sup>)</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="objectif_2" value="conforme" style="display: none;">Atteinte
                                d'une
                                majeure partie des objectifs</td>
                            <td><input type="radio" name="comportement_2" value="cco"
                                    style="display: none;">Contribution
                                correcte (CCO)</td>
                            <td><input type="radio" name="comportement_2" value="cco+"
                                    style="display: none;">Contribution
                                Correcte<sup>+</sup> (CCO<sup>+</sup>)</td>
                            <td><input type="radio" name="comportement_2" value="csu"
                                    style="display: none;">Contribution
                                supérieure (CSU)</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="objectif_2" value="modele" style="display: none;">Atteinte de
                                l'ensemble des objectifs</td>
                            <td><input type="radio" name="comportement_2" value="csu+"
                                    style="display: none;">Contribution
                                supérieure<sup>+</sup> (CSU<sup>+</sup>)</td>
                            <td><input type="radio" name="comportement_2" value="cee"
                                    style="display: none;">Contribution
                                exceptionnelle (CEE)</td>
                            <td><input type="radio" name="comportement_2" value="cee+"
                                    style="display: none;">Contribution
                                exceptionnelle<sup>+</sup> (CEE<sup>+</sup>)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <div class="section-title mt-0" style="font-weight: bold; font-size: 20px">Incidence de des retards et des
                    absences

                </div>
                <table class="table table-bordered">
                    <tr style="text-align: center">
                        <th scope="col">Retards / Repos medicaux / hospitalisations / evacuation sanitaire</th>
                        <th scope="col">Atteinte des objectifs</th>
                        <th scope="col">Comportement</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="retards"
                                    value="02 réductions ou 1 suppression de la prime d'assiduité" style="display: none;">02
                                réductions ou 1 suppression de la prime d'assiduité</td>
                            <td><input type="radio" name="objectifs" value="majeure" style="display: none;">Pas
                                d'incidence
                            </td>
                            <td><input type="radio" name="comportement" value="rien" style="display: none;">Pas
                                d'incidence
                            </td>

                        </tr>
                        <tr>
                            <td><input type="radio" name="retards"
                                    value="Entre 03 et 04 réductions ou 02 suppression de la prime
                            d'assiduité"
                                    style="display: none;">Entre 03 et 04 réductions ou 02 suppression de la prime
                                d'assiduité</td>
                            <td><input type="radio" name="objectifs" value="majeure" style="display: none;">Pas
                                d'incidence
                            </td>
                            <td><input type="radio" name="comportement" value="conforme"
                                    style="display: none;">Comportement
                                conforme</td>

                        </tr>
                        <tr>
                            <td><input type="radio" name="retards"
                                    value="A partir de 05 réductions ou 03 suppression de la prime
                                    d'assiduité"
                                    style="display: none;">A partir de 05 réductions ou 03 suppression de la prime
                                d'assiduités</td>
                            <td><input type="radio" name="objectifs" value="mineure" style="display: none;">Atteinte
                                d'une
                                mineure partie des objectifs</td>
                            <td><input type="radio" name="comportement" value="juste"
                                    style="display: none;">Comportement
                                juste conforme</td>

                        </tr>

                        <tr>
                            <td><input type="radio" name="retards"
                                    value="Absence justifiée pour maladie de 01 à 10 jours" style="display: none;">Absence
                                justifiée pour maladie de 01 à 10 jours</td>
                            <td><input type="radio" name="objectifs" value="majeure" style="display: none;">Pas
                                d'incidence</td>
                            <td><input type="radio" name="comportement" value="rien" style="display: none;">Pas
                                d'incidence</td>

                        </tr>

                        <tr>
                            <td><input type="radio" name="retards"
                                    value="A partir de 05 réductions ou 03 suppression de la prime
                                    d'assiduité"
                                    style="display: none;">Absence justifiée pour maladie de 11 à 20 jours</td>
                            <td><input type="radio" name="objectifs" value="majeure" style="display: none;">Atteinte
                                d'une
                                majeure partie des objectifs</td>
                            <td><input type="radio" name="comportement" value="conforme"
                                    style="display: none;">Comportement
                                conforme</td>
                        </tr>

                        <tr>
                            <td><input type="radio" name="retards"
                                    value="Absence justifiée pour maladie de de plus de 20 jours"
                                    style="display: none;">Absence justifiée pour maladie de de plus de 20 jours</td>
                            <td><input type="radio" name="objectifs" value="mineure" style="display: none;">Atteinte
                                d'une
                                mineure partie des objectifs</td>
                            <td><input type="radio" name="comportement" value="juste"
                                    style="display: none;">Comportement
                                juste conforme</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <div class="section-title mt-0" style="font-weight: bold; font-size: 20px">Incidence des sanctions

                </div>
                <table class="table table-bordered">
                    <tr style="text-align: center">
                        <th scope="col">Sanctions</th>
                        <th scope="col">Baisse de la note</th>
                        <th scope="col">Baisse du taux de gratification</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" id="1" name="sanctions[]" value="avertissement"
                                    style="display: none;">Avertissement</td>
                            <td>-1
                            </td>
                            <td>-10%
                            </td>

                        </tr>
                        <tr>
                            <td><input type="checkbox" id="3" name="sanctions[]" value="blame"
                                    style="display: none;">Entre 03 et 04 réductions ou 02 suppression de la
                                Blame</td>
                            <td>
                                -1.5
                            </td>
                            <td>
                                -15%
                            </td>

                        </tr>
                        <tr>
                            <td><input type="checkbox" id="4" name="sanctions[]"
                                    value="mise_a_pieds"style="display: none;">Mise a pied</td>
                            <td>-2</td>
                            <td>-20%</td>

                        </tr>

                        <tr>
                            <td><input type="checkbox" id="w" name="sanctions[]"
                                    value="sanction_2_degre"style="display: none;">sanction de 2eme degre(retard a
                                l'avancement, retrogradation)</td>
                            <td>-4</td>
                            <td>-40%</td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer row">

                <button type="reset" class="btn btn-block btn-outline-danger col-5">Annuler</button>
                <button type="submit" class="btn btn-block btn-outline-primary col-5  offset-2">Enregistrer</button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            //table 1
            let objectifTds = document.querySelectorAll("td input[name='objectif_2']");
            let comportementTds = document.querySelectorAll("td input[name='comportement_2']");

            for (let i = 0; i < objectifTds.length; i++) {

                let td = objectifTds[i].parentNode;

                td.addEventListener("click", function() {

                    // Si le td est déjà sélectionné, le désélectionner
                    if (td.classList.contains("selected")) {
                        td.classList.remove("selected");
                        td.childNodes[0].checked = false
                    } else {
                        // Désélectionner tous les tds d'objectif_2
                        for (let j = 0; j < objectifTds.length; j++) {
                            objectifTds[j].parentNode.classList.remove("selected");
                            objectifTds[j].checked = false
                        }

                        // Sélectionner le td cliqué
                        td.classList.add("selected");
                        td.childNodes[0].checked = true
                    }
                });
            }

            for (let i = 0; i < comportementTds.length; i++) {
                let td = comportementTds[i].parentNode;

                td.addEventListener("click", function() {
                    // Si le td est déjà sélectionné, le désélectionner
                    if (td.classList.contains("selected")) {
                        td.classList.remove("selected");
                        td.childNodes[0].checked = false
                    } else {
                        // Désélectionner tous les tds de comportement_2
                        for (let j = 0; j < comportementTds.length; j++) {
                            comportementTds[j].parentNode.classList.remove("selected");
                            comportementTds[j].checked = false
                        }

                        // Sélectionner le td cliqué
                        td.classList.add("selected");
                        td.childNodes[0].checked = true
                    }
                });
            }


            //table 2
            let retardTds = document.querySelectorAll("td input[name='retards']");
            let objectifsTds = document.querySelectorAll("td input[name='objectifs']");
            let comportementsTds = document.querySelectorAll("td input[name='comportement']");

            for (let i = 0; i < objectifsTds.length; i++) {
                let td = objectifsTds[i].parentNode;

                td.addEventListener("click", function() {
                    // Si le td est déjà sélectionné, le désélectionner
                    if (td.classList.contains("selected")) {
                        td.classList.remove("selected");
                        td.childNodes[0].checked = false
                    } else {
                        // Désélectionner tous les tds d'objectif_2
                        for (let j = 0; j < objectifsTds.length; j++) {
                            objectifsTds[j].parentNode.classList.remove("selected");
                            objectifsTds[j].checked = false
                        }

                        // Sélectionner le td cliqué
                        td.classList.add("selected");
                        td.childNodes[0].checked = true
                    }
                });
            }

            for (let i = 0; i < retardTds.length; i++) {
                let td = retardTds[i].parentNode;

                td.addEventListener("click", function() {
                    // Si le td est déjà sélectionné, le désélectionner
                    if (td.classList.contains("selected")) {
                        td.classList.remove("selected");
                        td.childNodes[0].checked = false
                    } else {
                        // Désélectionner tous les tds de comportement_2
                        for (let j = 0; j < retardTds.length; j++) {
                            retardTds[j].parentNode.classList.remove("selected");
                            retardTds[j].checked = false
                        }

                        // Sélectionner le td cliqué
                        td.classList.add("selected");
                        td.childNodes[0].checked = true
                    }
                });
            }

            for (let i = 0; i < comportementsTds.length; i++) {
                let td = comportementsTds[i].parentNode;

                td.addEventListener("click", function() {
                    // Si le td est déjà sélectionné, le désélectionner
                    if (td.classList.contains("selected")) {
                        td.classList.remove("selected");
                        td.childNodes[0].checked = false
                    } else {
                        // Désélectionner tous les tds de comportement_2
                        for (let j = 0; j < comportementsTds.length; j++) {
                            comportementsTds[j].parentNode.classList.remove("selected");
                            comportementsTds[j].checked = false
                        }

                        // Sélectionner le td cliqué
                        td.classList.add("selected");
                        td.childNodes[0].checked = true
                    }
                });
            }

            let sanctionsCheckboxes = document.querySelectorAll("input[name='sanctions[]']");

            for (let i = 0; i < sanctionsCheckboxes.length; i++) {
                let checkbox = sanctionsCheckboxes[i];
                let td = checkbox.parentNode;

                td.addEventListener("click", function() {
                    // Inverser l'état de la case à cocher
                    checkbox.checked = !checkbox.checked;

                    // Mettre en surbrillance le td si la case à cocher est cochée
                    if (checkbox.checked) {
                        td.classList.add("selected");

                    } else {
                        td.classList.remove("selected");
                    }
                });
            }
        });
    </script>
@endsection
