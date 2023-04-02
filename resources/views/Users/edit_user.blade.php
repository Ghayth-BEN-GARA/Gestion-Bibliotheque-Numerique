<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Modifier l'utilisateur | Bibliothèque</title>
    </head>
    @include("Layouts.body_type_mode")
        <div class = "wrapper">
            @include("Layouts.left_navbar")
            <div class = "content-page">
                <div class = "content">
                    @include("Layouts.top_navbar")
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <ol class = "breadcrumb m-0">
                                            <li class = "breadcrumb-item">
                                                <a href = "{{url('/dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class = "breadcrumb-item active">Modifier l'utilisateur</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Modifier l'utilisateur</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Modifier l'utilisateur</h4>
                                        <p class = "text-muted font-14">
                                            Modifiez cette utilisateur en ajoutant les informations requises. Cette utilisateur peut être un étudiant ou un enseignant.
                                        </p>
                                        @if(Session()->has("success"))
                                            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('success')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @elseif(Session()->has("erreur"))
                                            <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('erreur')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @endif
                                        @if($user->getRoleUserAttribute() == "Étudiant")
                                            <form name = "modifier-etudiant-form" id = "modifier-etudiant-form" method = "post" action = "{{url('/update-etudiant')}}">
                                                @csrf
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "nom" class = "form-label">Nom</label>
                                                            <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez le nom.." value = "{{$user->getNomUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "prenom" class = "form-label">Prénom</label>
                                                            <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez le prénom.." value = "{{$user->getPrenomUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                            <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez la date de naissance.." value = "{{$user->getDateNaissanceUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "genre" class = "form-label">Genre</label>
                                                            <select class = "form-select" id = "genre" name = "genre" required>
                                                                <option value = "#" selected disabled>Sélectionnez le genre..</option>
                                                                <option value = "Femme" <?php echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Femme" ? "selected" : '' ?>>Femme</option>
                                                                <option value = "Homme" <?php  echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Homme" ? "selected" : '' ?>>Homme</option>
                                                                <option value = "Non spécifié" <?php echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Non spécifié" ? "selected" : '' ?>>Non spécifié</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "role" class = "form-label">Rôle</label>
                                                            <input type = "text" class = "form-control" id = "role" name = "role" placeholder = "Saisissez le rôle.." value = "Étudiant" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "numero" class = "form-label">Numéro</label>
                                                            <input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez le numéro.." value = "{{$user->getMobileUserAttribute()}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                        </div>
                                                        @if (session()->has('erreur_numero'))
                                                            <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_numero')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "adresse" class = "form-label">Adresse</label>
                                                            <input type = "text" class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez l'adresse.." value = "{{$user->getAdresseUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "cin" class = "form-label">Numéro de carte d'identité</label>
                                                            <input type = "number" class = "form-control" id = "cin" name = "cin" placeholder = "Saisissez le numéro de la carte d'identité.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" value = "{{$user->getCinUserAttribute()}}" required>
                                                        </div>
                                                        @if (session()->has('erreur_cin'))
                                                            <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_cin')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "matricule" class = "form-label">Matricule</label>
                                                            <input type = "text" class = "form-control" id = "matricule" name = "matricule" placeholder = "Saisissez la matricule.." value = "{{$user->matricule}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "niveau" class = "form-label">Niveau</label>
                                                            <input type = "text" class = "form-control" id = "niveau" name = "niveau" placeholder = "Saisissez la niveau.." value = "{{$user->niveau}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type = "hidden" id = "id_user" name = "id_user" value = "{{$_GET['id_user']}}" required>
                                                <div class = "row mt-3">
                                                    <div class = "col-sm-6"></div>
                                                    <div class = "col-sm-6 text-end">
                                                        <button type = "submit" class = "btn btn-primary">Créer</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @elseif($user->getRoleUserAttribute() == "Enseignant")
                                            <form name = "modifier-enseignant-form" id = "modifier-enseignant-form" method = "post" action = "{{url('/update-enseignant')}}">
                                                @csrf
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "nom" class = "form-label">Nom</label>
                                                            <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez le nom.." value = "{{$user->getNomUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "prenom" class = "form-label">Prénom</label>
                                                            <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez le prénom.." value = "{{$user->getPrenomUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                            <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez la date de naissance.." value = "{{$user->getDateNaissanceUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "genre" class = "form-label">Genre</label>
                                                            <select class = "form-select" id = "genre" name = "genre" required>
                                                                <option value = "#" selected disabled>Sélectionnez le genre..</option>
                                                                <option value = "Femme" <?php echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Femme" ? "selected" : '' ?>>Femme</option>
                                                                <option value = "Homme" <?php  echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Homme" ? "selected" : '' ?>>Homme</option>
                                                                <option value = "Non spécifié" <?php echo !$user->getGenreUserAttribute() == null && $user->getGenreUserAttribute() == "Non spécifié" ? "selected" : '' ?>>Non spécifié</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "role" class = "form-label">Rôle</label>
                                                            <input type = "text" class = "form-control" id = "role" name = "role" placeholder = "Saisissez le rôle.." value = "Étudiant" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "numero" class = "form-label">Numéro</label>
                                                            <input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez le numéro.." value = "{{$user->getMobileUserAttribute()}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                        </div>
                                                        @if (session()->has('erreur_numero'))
                                                            <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_numero')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "adresse" class = "form-label">Adresse</label>
                                                            <input type = "text" class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez l'adresse.." value = "{{$user->getAdresseUserAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "cin" class = "form-label">Numéro de carte d'identité</label>
                                                            <input type = "number" class = "form-control" id = "cin" name = "cin" placeholder = "Saisissez le numéro de la carte d'identité.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" value = "{{$user->getCinUserAttribute()}}" required>
                                                        </div>
                                                        @if (session()->has('erreur_cin'))
                                                            <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_cin')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                 <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "specialite" class = "form-label">Spécialité</label>
                                                            <input type = "text" class = "form-control" id = "specialite" name = "specialite" placeholder = "Saisissez la spécialité.." value = "{{$user->specialite}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "grade" class = "form-label">Grade</label>
                                                            <input type = "text" class = "form-control" id = "grade" name = "grade" placeholder = "Saisissez le grade.." value = "{{$user->grade}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type = "hidden" id = "id_user" name = "id_user" value = "{{$_GET['id_user']}}" required>
                                                <div class = "row mt-3">
                                                    <div class = "col-sm-6"></div>
                                                    <div class = "col-sm-6 text-end">
                                                        <button type = "submit" class = "btn btn-primary">Créer</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>