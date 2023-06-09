<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Modifier la réservation | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Modifier la réservation</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Modifier la réservation</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
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
                                                <div class = "col-lg-5">
                                                    <a href = "javascript: void(0)" class = "text-center d-block mb-4">
                                                        <img src = "{{URL::asset($reservation->image_livre)}}" class = "img-fluid" style = "max-width: 280px;" alt = "Image de livre">
                                                    </a>
                                                </div>
                                                <div class = "col-lg-7">
                                                    <form class = "ps-lg-4">
                                                        <h3 class = "mt-0">
                                                            {{$reservation->titre_livre}} 
                                                        </h3>
                                                        <p class = "mb-1 text-capitalize">
                                                            Aujourd'hui le 
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date("Y-m-d")))))
                                                            ?>
                                                        </p>
                                                        <p class = "font-16">
                                                            <span class = "text-warning mdi mdi-star"></span>
                                                            <span class = "text-warning mdi mdi-star"></span>
                                                            <span class = "text-warning mdi mdi-star"></span>
                                                            <span class = "text-warning mdi mdi-star"></span>
                                                            <span class = "text-warning mdi mdi-star"></span>
                                                        </p>
                                                        <div class = "mt-3">
                                                            <h4>
                                                                Auteur : {{$reservation->auteur_livre}}
                                                            </h4>
                                                        </div>
                                                        <div class = "mt-4">
                                                            <h6 class = "font-14">Identifiant :</h6>
                                                            <h3>{{$reservation->id_livre}}</h3>
                                                        </div>
                                                        <div class = "mt-4">
                                                            <h6 class = "font-14">Description :</h6>
                                                            <p>{{$reservation->description_livre}}</p>
                                                        </div>
                                                        <div class = "mt-4">
                                                            <h6 class = "font-14">Cadre spatio temporel :</h6>
                                                            <p class = "text-capitalize">
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode($reservation->getFormattedDateTimeCreationReservationAttribute())
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </form>
                                                </div>
                                                <form name = "modifier-reservation-form" id = "modifier-reservation-form" method = "post" action = "{{url('/modifier-reservation')}}" class = "mt-4">
                                                    @csrf
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "date_pret" class = "form-label">Date de réservation</label>
                                                                <input type = "date" class = "form-control" id = "date_pret" name = "date_pret" value = "{{$reservation->getDatePretAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "date_retour" class = "form-label">Date de retour</label>
                                                                <input type = "date" class = "form-control" id = "date_retour" name = "date_retour" value = "{{$reservation->getDateRetourAttribute()}}" required>
                                                            </div>
                                                            @if (session()->has('erreur_date_retour'))
                                                                <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_date_retour')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type = "hidden" name = "id_reservation" id = "id_reservation" value = "{{$_GET['id_reservation']}}" required>
                                                    <div class = "row mt-3">
                                                        <div class = "col-sm-6"></div>
                                                        <div class = "col-sm-6 text-end">
                                                            <button type = "submit" class = "btn btn-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
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