<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Utilisateur | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Utilisateur</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Utilisateur</h4>
                                </div>
                            </div>
                        </div>
                        @if(is_null($user))
                            <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <span class = "d-flex justify-content-start">
                                    Malheureusement, nous n'avons pas trouvé un utilisateur avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                </span>
                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                            </div>
                        @else
                            <div class = "row">
                                <div class = "col-xl-4 col-lg-5">
                                    <div class = "card text-center">
                                        <div class = "card-body">
                                            <img src = "{{URL::asset($user->getImageUserAttribute())}}" class = "rounded-circle avatar-lg img-thumbnail" alt = "Photo de profil">
                                            <h4 class = "mb-0 mt-2">{{$user->getFullnameUserAttribute()}}</h4>
                                            <p class = "text-muted font-14">{{$user->getRoleUserAttribute()}}</p>
                                            <div class = "text-start mt-3">
                                                <h4 class = "font-13 text-uppercase">À propos :</h4>
                                                <p class = "text-muted font-13 mb-3">
                                                    Bonjour je m'appelle {{$user->getFullnameUserAttribute()}}, je suis un {{$user->getRoleUserAttribute()}} de l'IPSAS.
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Nom :</strong>
                                                    <span class = "ms-2">{{$user->getFullnameUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Numéro :</strong>
                                                    <span class = "ms-2">{{$user->getFormattedMobileUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Email :</strong>
                                                    <span class = "ms-2">{{$user->getEmailUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Adresse :</strong>
                                                    <span class = "ms-2">{{$user->getAdresseUserAttribute()}}</span>
                                                </p>
                                            </div>
                                            <ul class = "social-list list-inline mt-3 mb-0">
                                                <li class = "list-inline-item">
                                                    <a href = "{{$links->getLinkFacebookAttribute()}}" class = "social-list-item border-primary text-primary" target = "_blank">
                                                        <i class = "mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$links->getLinkInstagramAttribute()}}" class = "social-list-item border-danger text-danger" target = "_blank">
                                                        <i class = "mdi mdi-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$links->getLinkGithubAttribute()}}" class = "social-list-item border-secondary text-secondary" target = "_blank">
                                                        <i class = "mdi mdi-github"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$links->getLinkLinkedinAttribute()}}" class = "social-list-item border-info text-info" target = "_blank">
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
                                                        Informations de profil
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class = "tab-content">
                                                <div class = "tab-pane show active" id = "aboutme">
                                                    <h5 class = "text-uppercase mb-4">
                                                        <i class = "mdi mdi-account-circle me-1"></i>
                                                        Informations
                                                    </h5>
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-6">
                                                            <span>
                                                                <i class = "mdi mdi-account me-1"></i>
                                                                <b class = "text-capitalize">Nom :</b>
                                                            </span>
                                                            <br>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getFullnameUserAttribute()}}
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
                                                                    echo utf8_encode($user->getFormattedDateNaissanceUserAttribute())
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
                                                                {{$user->getGenreUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-6 text-end">
                                                            <span>
                                                                <i class = "mdi mdi-account-group-outline me-1"></i>
                                                                <b class = "text-capitalize">Rôle :</b>
                                                            </span>
                                                            <br>
                                                            <span class = "mx-1 text-capitalize">
                                                                {{$user->getRoleUserAttribute()}}
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
                                                                {{$user->getFormattedMobileUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-6 text-end">
                                                            <span>
                                                                <i class = "mdi mdi-crosshairs-gps me-1"></i>
                                                                <b class = "text-capitalize">Adresse :</b>
                                                            </span>
                                                            <br>
                                                            <span class = "mx-1 text-capitalize">
                                                                {{$user->getAdresseUserAttribute()}}
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
                                                                {{$user->getFormattedCinUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-6 text-end">
                                                            <span>
                                                                <i class = "mdi mdi-email me-1"></i>
                                                                <b class = "text-capitalize">Adresse email :</b>
                                                            </span>
                                                            <br>
                                                            <span class = "mx-1">
                                                                {{$user->getEmailUserAttribute()}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    @if($user->getRoleUserAttribute() == "Étudiant")
                                                        <div class = "row col-md-12 mb-3">
                                                            <div class = "col-md-6">
                                                                <span>
                                                                    <i class = "mdi mdi-elevator me-1"></i>
                                                                    <b class = "text-capitalize">Niveau :</b>
                                                                </span>
                                                                <br>
                                                                <span class = "mx-1 text-capitalize">
                                                                    {{$user->niveau}}
                                                                </span>
                                                            </div>
                                                            <div class = "col-md-6 text-end">
                                                                <span>
                                                                    <i class = "mdi mdi-card-account-details me-1"></i>
                                                                    <b class = "text-capitalize">Matricule :</b>
                                                                </span>
                                                                <br>
                                                                <span class = "mx-1 text-capitalize">
                                                                    {{$user->matricule}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @elseif($user->getRoleUserAttribute() == "Enseignant")
                                                        <div class = "row col-md-12 mb-3">
                                                            <div class = "col-md-6">
                                                                <span>
                                                                    <i class = "mdi mdi-graph me-1"></i>
                                                                    <b class = "text-capitalize">Grade :</b>
                                                                </span>
                                                                <br>
                                                                <span class = "mx-1 text-capitalize">
                                                                    {{$user->grade}}
                                                                </span>
                                                            </div>
                                                            <div class = "col-md-6 text-end">
                                                                <span>
                                                                    <i class = "mdi mdi-book-education me-1"></i>
                                                                    <b class = "text-capitalize">Spécialité :</b>
                                                                </span>
                                                                <br>
                                                                <span class = "mx-1 text-capitalize">
                                                                    {{$user->specialite}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-6">
                                                            <span>
                                                                <i class = "mdi mdi-list-status me-1"></i>
                                                                <b class = "text-capitalize">Status :</b>
                                                            </span>
                                                            <br>
                                                            <span class = "mx-3 text-capitalize">
                                                                @if($user->getStatusUserAttribute() == 1)
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
                                                                    echo utf8_encode($user->getFormattedDateTimeCreationUserAttribute())
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>