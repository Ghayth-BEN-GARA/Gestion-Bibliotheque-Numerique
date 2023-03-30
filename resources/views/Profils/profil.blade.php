<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Profil | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Profil</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Profil</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-xl-4 col-lg-5">
                                <div class = "card text-center">
                                    <div class = "card-body">
                                        <img src = "{{URL::asset(auth()->user()->getImageUserAttribute())}}" class = "rounded-circle avatar-lg img-thumbnail" alt = "Photo de profil">
                                        <h4 class = "mb-0 mt-2">{{auth()->user()->getFullnameUserAttribute()}}</h4>
                                        <p class = "text-muted font-14">{{auth()->user()->getRoleUserAttribute()}}</p>
                                        <a href = "{{url('/edit-photo-profil')}}" class = "btn btn-success btn-sm mb-2">Modifier la photo de profil</a>
                                        <div class = "text-start mt-3">
                                            <h4 class = "font-13 text-uppercase">À propos de mois :</h4>
                                            <p class = "text-muted font-13 mb-3">
                                                Bonjour je m'appelle {{auth()->user()->getFullnameUserAttribute()}}, je suis un {{auth()->user()->getRoleUserAttribute()}} de l'IPSAS.
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Nom :</strong>
                                                <span class = "ms-2">{{auth()->user()->getFullnameUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Numéro :</strong>
                                                <span class = "ms-2">{{auth()->user()->getFormattedMobileUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Email :</strong>
                                                <span class = "ms-2">{{auth()->user()->getEmailUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Adresse :</strong>
                                                <span class = "ms-2">{{auth()->user()->getAdresseUserAttribute()}}</span>
                                            </p>
                                        </div>
                                        <ul class = "social-list list-inline mt-3 mb-0">
                                            <li class = "list-inline-item">
                                                <a href = "{{$links_reseaux_sociaux->getLinkFacebookAttribute()}}" class = "social-list-item border-primary text-primary" target = "_blank">
                                                    <i class = "mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$links_reseaux_sociaux->getLinkInstagramAttribute()}}" class = "social-list-item border-danger text-danger" target = "_blank">
                                                    <i class = "mdi mdi-instagram"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$links_reseaux_sociaux->getLinkGithubAttribute()}}" class = "social-list-item border-secondary text-secondary" target = "_blank">
                                                    <i class = "mdi mdi-github"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$links_reseaux_sociaux->getLinkLinkedinAttribute()}}" class = "social-list-item border-info text-info" target = "_blank">
                                                    <i class = "mdi mdi-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-xl-8 col-lg-7">
                                <div class = "card">
                                    <div class = "card-body">
                                        <ul class = "nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class = "nav-item">
                                                <a href = "#aboutme" data-bs-toggle = "tab" aria-expanded = "true" class = "nav-link rounded-0 active">
                                                    À propos
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href="#edit_infos" data-bs-toggle = "tab" aria-expanded = "false" class="nav-link rounded-0">
                                                    Modifier
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href="#securite" data-bs-toggle = "tab" aria-expanded = "false" class="nav-link rounded-0">
                                                    Sécurité
                                                </a>
                                            </li>
                                        </ul>
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "aboutme">
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
                                                <h5 class = "text-uppercase mb-4">
                                                    <i class = "mdi mdi-account-circle me-1"></i>
                                                    À propos
                                                </h5>
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-6">
                                                        <span>
                                                            <i class = "mdi mdi-account me-1"></i>
                                                            <b class = "text-capitalize">Nom :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getFullnameUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-6 text-end">
                                                        <span>
                                                            <i class = "mdi mdi-calendar me-1"></i>
                                                            <b class = "text-capitalize">Date de naissance :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-1 text-capitalize">
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode(auth()->user()->getFormattedDateNaissanceUserAttribute())
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-6">
                                                        <span>
                                                            <i class = "mdi mdi-gender-male-female me-1"></i>
                                                            <b class = "text-capitalize">Genre :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getGenreUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-6 text-end">
                                                        <span>
                                                            <i class = "mdi mdi-account-group-outline me-1"></i>
                                                            <b class = "text-capitalize">Rôle :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-1 text-capitalize">
                                                            {{auth()->user()->getRoleUserAttribute()}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-6">
                                                        <span>
                                                            <i class = "mdi mdi-cellphone-android me-1"></i>
                                                            <b class = "text-capitalize">Numéro :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getFormattedMobileUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-6 text-end">
                                                        <span>
                                                            <i class = "mdi mdi-crosshairs-gps me-1"></i>
                                                            <b class = "text-capitalize">Adresse :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-1 text-capitalize">
                                                            {{auth()->user()->getAdresseUserAttribute()}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-6">
                                                        <span>
                                                            <i class = "mdi mdi-badge-account-horizontal-outline me-1"></i>
                                                            <b class = "text-capitalize">Numéro de carte d'identité :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getFormattedCinUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-6 text-end">
                                                        <span>
                                                            <i class = "mdi mdi-email me-1"></i>
                                                            <b class = "text-capitalize">Adresse email :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-1 text-capitalize">
                                                            {{auth()->user()->getEmailUserAttribute()}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-6">
                                                        <span>
                                                            <i class = "mdi mdi-list-status me-1"></i>
                                                            <b class = "text-capitalize">Status :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-3 text-capitalize">
                                                            @if(auth()->user()->getStatusUserAttribute() == 1)
                                                                Activé
                                                            @else
                                                                Désactivé
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-6 text-end">
                                                        <span>
                                                            <i class = "mdi mdi-calendar me-1"></i>
                                                            <b class = "text-capitalize">Date de création :</b>
                                                        </span>
                                                        <br>
                                                        <span class = "mx-1 text-capitalize">
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode(auth()->user()->getFormattedDateTimeCreationUserAttribute())
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "tab-pane" id = "edit_infos">
                                                <h5 class = "text-uppercase mb-4">
                                                    <i class = "mdi mdi-account-edit-outline me-1"></i>
                                                    Modifier les informations
                                                </h5>
                                                <form name = "f-form-modifier-informations-basic" id  = "f-form-modifier-informations-basic" method = "post" action = "{{url('/modifier-informations-basic')}}">
                                                    @csrf
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "nom" class = "form-label">Nom</label>
                                                                <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez votre nom.." value = "{{auth()->user()->getNomUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "prenom" class = "form-label">Prénom</label>
                                                                <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez votre prénom.." value = "{{auth()->user()->getPrenomUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                                <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez votre date de naissance.." value = "{{auth()->user()->getDateNaissanceUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "genre" class = "form-label">Genre</label>
                                                                <select class = "form-select" id = "genre" name = "genre" required>
                                                                    <option value = "#" selected disabled>Sélectionnez votre genre..</option>
                                                                    <option value = "Femme" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Femme' ? 'selected' : '' ?>>Femme</option>
                                                                    <option value = "Homme" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Homme' ? 'selected' : '' ?>>Homme</option>
                                                                    <option value = "Non spécifié" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Non spécifié' ? 'selected' : ''; ?>>Non spécifié</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "role" class = "form-label">Rôle</label>
                                                                <input type = "text" class = "form-control" id = "role" name = "role" placeholder = "Saisissez votre rôle.." value = "{{auth()->user()->getRoleUserAttribute()}}" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "numero" class = "form-label">Numéro</label>
                                                                <input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez votre numéro.." value = "{{auth()->user()->getMobileUserAttribute()}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "adresse" class = "form-label">Adresse</label>
                                                                <input type = "text" class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez votre adresse.." value = "{{auth()->user()->getAdresseUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "cin" class = "form-label">Numéro de carte d'identité</label>
                                                                <input type = "number" class = "form-control" id = "cin" name = "cin" placeholder = "Saisissez votre cin.." value = "{{auth()->user()->getCinUserAttribute()}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "email" class = "form-label">Email</label>
                                                                <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez votre adresse email.." value = "{{auth()->user()->getEmailUserAttribute()}}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "date_creation" class = "form-label">Date de création</label>
                                                                <input type = "text" class = "form-control" id = "date_creation" name = "date_creation" placeholder = "Saisissez votre date de création.." value = "<?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(auth()->user()->getFormattedDateTimeCreationUserAttribute());?>" required disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row mt-3">
                                                        <div class = "col-sm-6"></div>
                                                        <div class = "col-sm-6 text-end">
                                                            <button type = "submit" class = "btn btn-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                    <i class = "mdi mdi-earth me-1"></i> 
                                                    Réseaux sociaux
                                                </h5>
                                                <form name = "f-form-modifier-reseaux-sociaux" id  = "f-form-modifier-reseaux-sociaux" method = "post" action = "{{url('/modifier-reseaux-sociaux')}}">
                                                    @csrf
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "facebook" class = "form-label">Facebook</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-facebook"></i></span>
                                                                        <input type = "url" class = "form-control" id = "facebook" name = "facebook" placeholder = "Saisissez le lien.." value = "{{$links_reseaux_sociaux->getLinkFacebookAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "instagram" class = "form-label">Instagram</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-instagram"></i></span>
                                                                        <input type = "url" class = "form-control" id = "instagram" name = "instagram" placeholder = "Saisissez le lien.." value = "{{$links_reseaux_sociaux->getLinkInstagramAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row mt-3">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "linkedin" class = "form-label">Linkedin</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-linkedin"></i></span>
                                                                        <input type = "url" class = "form-control" id = "linkedin" name = "linkedin" placeholder = "Saisissez le lien.." value = "{{$links_reseaux_sociaux->getLinkLinkedinAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "github" class = "form-label">Github</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-github"></i></span>
                                                                        <input type = "url" class = "form-control" id = "github" name = "github" placeholder = "Saisissez le lien.." value = "{{$links_reseaux_sociaux->getLinkGithubAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row mt-3">
                                                        <div class = "col-sm-6"></div>
                                                        <div class = "col-sm-6 text-end">
                                                            <button type = "submit" class = "btn btn-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class = "tab-pane" id = "securite">
                                                <h5 class = "text-uppercase mb-4">
                                                    <i class = "mdi mdi-security me-1"></i>
                                                    Sécurité
                                                </h5>
                                                <form name = "f-form-modifier-email" id  = "f-form-modifier-email" method = "post" action = "{{url('/modifier-email')}}">
                                                    @csrf
                                                    <div class = "row">
                                                        <div class = "col-md-12">
                                                            <div class = "mb-3">
                                                                <label for = "email" class = "form-label">Adresse Email</label>
                                                                <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez votre adresse email.." value = "{{auth()->user()->getEmailUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row mt-3">
                                                        <div class = "col-sm-6"></div>
                                                        <div class = "col-sm-6 text-end">
                                                            <button type = "submit" class = "btn btn-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                    <i class = "mdi mdi-lock me-1"></i> 
                                                    Mots de passes
                                                </h5>
                                                <form name = "f-form-modifier-password" id  = "f-form-modifier-password" method = "post" action = "{{url('/modifier-password')}}">
                                                    @csrf
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "password" class = "form-label">Nouveau Mot De Passe</label>
                                                                <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez le nouveau mot de passe.." required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "confirm_password" class = "form-label">Confirmation Du Mot De Passe</label>
                                                                <input type = "password" class = "form-control" id = "confirm_password" name = "confirm_password" placeholder = "Confirmez le nouveau mot de passe.." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row mt-3">
                                                        <div class = "col-sm-6"></div>
                                                        <div class = "col-sm-6 text-end">
                                                            <button type = "submit" class = "btn btn-primary">Modifier</button>
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
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>