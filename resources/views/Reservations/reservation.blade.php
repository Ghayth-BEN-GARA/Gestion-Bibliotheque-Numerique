<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Réservation | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Réservation</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Réservation</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "">
                                    <div class = "card-body">
                                        @if(is_null($reservation))
                                            <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    Malheureusement, nous n'avons pas trouvé une réservation avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @else
                                            <div class = "row">
                                                <div class = "col-xxl-8 col-lg-6">
                                                    <div class = "card d-block">
                                                        <div class = "card-body">
                                                            <h3 class = "mt-0">
                                                                {{$reservation->titre_livre}}
                                                            </h3>
                                                            <div class = "badge bg-success text-light mb-3 p-2">Réservé</div>
                                                            <h5>Auteur :</h5>
                                                            <p class = "text-muted mb-2">
                                                                {{$reservation->auteur_livre}}
                                                            </p>
                                                            <h5>Description :</h5>
                                                            <p class = "text-muted mb-2">
                                                                {{$reservation->description_livre}}
                                                            </p>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-4">
                                                                        <h5>Date de réservation</h5>
                                                                        <p class = "text-capitalize">
                                                                            <?php
                                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                                echo utf8_encode($reservation->getFormattedDatePretAttribute())
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-4">
                                                                        <h5>Date de retour</h5>
                                                                        <p class = "text-capitalize">
                                                                            <?php
                                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                                echo utf8_encode($reservation->getFormattedDateRetourAttribute())
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id = "tooltip-container">
                                                                <h5>{{auth()->user()->getRoleUserAttribute()}} :</h5>
                                                                <a href = "javascript:void(0)" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{auth()->user()->getFullnameUserAttribute()}}" class = "d-inline-block">
                                                                    <img src = "{{URL::asset(auth()->user()->getImageUserAttribute())}}" class = "rounded-circle img-thumbnail avatar-sm" alt = "{{auth()->user()->getFullnameUserAttribute()}}">
                                                                </a>
                                                                <p class = "d-inline-block">{{auth()->user()->getFullnameUserAttribute()}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-6 col-xxl-4">
                                                    <div class = "card">
                                                        <div class = "card-body">
                                                            <h5 class = "card-title mb-3">Image de livre</h5>
                                                            <div dir = "ltr">
                                                                <div class = "mt-3" style = "height: 363px;">
                                                                    <img src = "{{$reservation->image_livre}}" height = 300>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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