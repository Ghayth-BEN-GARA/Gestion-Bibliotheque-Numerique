<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouveau utilisateur | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Nouveau utilisateur</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Nouveau utilisateur</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouveau utilisateur</h4>
                                        <p class = "text-muted font-14">
                                            Créez un nouveau utilisateur en ajoutant les informations requises pour chaque utilisateur. Cette utilisateur peut être un étudiant ou un enseignant.
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
                                        <ul class = "nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class = "nav-item">
                                                <a href = "#billing-information" data-bs-toggle = "tab" aria-expanded = "false" class = "nav-link rounded-0 active">
                                                    <i class = "mdi mdi-account-heart font-18"></i>
                                                    <span class = "d-none d-lg-block">Créer Un Étudiant</span>
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href = "#shipping-information" data-bs-toggle = "tab" aria-expanded = "true" class = "nav-link rounded-0">
                                                    <i class = "mdi mdi-account-heart-outline font-18"></i>
                                                    <span class = "d-none d-lg-block">Créer un Enseignant</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "billing-information">
                                                <div class = "row">
                                                    <div class = "col-lg-12">
                                                        <h4 class = "mt-2">Créer un étudiant</h4>
                                                        <p class = "text-muted mb-4">
                                                            Remplir ce formulaire par des informations de l'étudiant.
                                                        </p>
                                                        <form name = "creer-etudiant-form" id = "creer-etudiant-form" method = "post" action = "{{url('/creer-etudiant')}}">
                                                            @csrf
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "nom" class = "form-label">Nom</label>
                                                                        <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez le nom.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "prenom" class = "form-label">Prénom</label>
                                                                        <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez le prénom.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                                        <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez la date de naissance.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "genre" class = "form-label">Genre</label>
                                                                        <select class = "form-select" id = "genre" name = "genre" required>
                                                                            <option value = "#" selected disabled>Sélectionnez le genre..</option>
                                                                            <option value = "Femme">Femme</option>
                                                                            <option value = "Homme">Homme</option>
                                                                            <option value = "Non spécifié">Non spécifié</option>
                                                                        </select>
                                                                    </div>
                                                                    @if (session()->has('erreur_genre'))
                                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_genre')}}</p>
                                                                    @endif
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
                                                                        <input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez le numéro.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
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
                                                                        <input type = "text" class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez l'adresse.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "cin" class = "form-label">Numéro de carte d'identité</label>
                                                                        <input type = "number" class = "form-control" id = "cin" name = "cin" placeholder = "Saisissez le numéro de la carte d'identité.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                                    </div>
                                                                    @if (session()->has('erreur_cin'))
                                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_cin')}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "email" class = "form-label">Email</label>
                                                                        <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez l'adresse email.." required>
                                                                    </div>
                                                                    @if (session()->has('erreur_email'))
                                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_email')}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "password" class = "form-label">Mot de passe</label>
                                                                        <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez le mot de passe.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "matricule" class = "form-label">Matricule</label>
                                                                        <input type = "text" class = "form-control" id = "matricule" name = "matricule" placeholder = "Saisissez la matricule.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "niveau" class = "form-label">Niveau</label>
                                                                        <input type = "text" class = "form-control" id = "niveau" name = "niveau" placeholder = "Saisissez la niveau.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row mt-3">
                                                                <div class = "col-sm-6"></div>
                                                                <div class = "col-sm-6 text-end">
                                                                    <button type = "submit" class = "btn btn-primary">Créer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "tab-pane show" id = "shipping-information">
                                                <div class = "row">
                                                    <div class = "col-lg-12">
                                                        <h4 class = "mt-2">Créer un enseignant</h4>
                                                        <p class = "text-muted mb-4">
                                                            Remplir ce formulaire par des informations de l'enseignant.
                                                        </p>
                                                        <form name = "creer-enseignant-form" id = "creer-enseignant-form" method = "post" action = "{{url('/creer-enseignant')}}">
                                                            @csrf
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "nom" class = "form-label">Nom</label>
                                                                        <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez le nom.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "prenom" class = "form-label">Prénom</label>
                                                                        <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez le prénom.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                                        <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez la date de naissance.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "genre" class = "form-label">Genre</label>
                                                                        <select class = "form-select" id = "genre" name = "genre" required>
                                                                            <option value = "#" selected disabled>Sélectionnez le genre..</option>
                                                                            <option value = "Femme">Femme</option>
                                                                            <option value = "Homme">Homme</option>
                                                                            <option value = "Non spécifié">Non spécifié</option>
                                                                        </select>
                                                                    </div>
                                                                    @if (session()->has('erreur_genre'))
                                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_genre')}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "role" class = "form-label">Rôle</label>
                                                                        <input type = "text" class = "form-control" id = "role" name = "role" placeholder = "Saisissez le rôle.." value = "Enseignant" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "numero" class = "form-label">Numéro</label>
                                                                        <input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez le numéro.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
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
                                                                        <input type = "text" class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez l'adresse.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "cin" class = "form-label">Numéro de carte d'identité</label>
                                                                        <input type = "number" class = "form-control" id = "cin" name = "cin" placeholder = "Saisissez le numéro de la carte d'identité.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                                    </div>
                                                                    @if (session()->has('erreur_cin'))
                                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_cin')}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "email" class = "form-label">Email</label>
                                                                        <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez l'adresse email.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "password" class = "form-label">Mot de passe</label>
                                                                        <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez le mot de passe.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "specialite" class = "form-label">Spécialité</label>
                                                                        <input type = "text" class = "form-control" id = "specialite" name = "specialite" placeholder = "Saisissez la spécialité.." required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "grade" class = "form-label">Grade</label>
                                                                        <input type = "text" class = "form-control" id = "grade" name = "grade" placeholder = "Saisissez le grade.." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row mt-3">
                                                                <div class = "col-sm-6"></div>
                                                                <div class = "col-sm-6 text-end">
                                                                    <button type = "submit" class = "btn btn-primary">Créer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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