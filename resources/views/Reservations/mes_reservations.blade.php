<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Mes résevations | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Mes résevations</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Mes résevations</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "">
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
                                    </div>
                                    @if(is_null($mes_reservations))
                                        <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                            <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <span class = "d-flex justify-content-start">
                                                Malheureusement, nous n'avons pas trouvé des réservations crées par vous. Veuillez vérifier l'identifiant et réessayer plus tard.
                                            </span>
                                            <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                        </div>
                                    @else
                                        <div class = "row">
                                            @foreach($mes_reservations as $data)
                                                <div class = "col-md-6 col-xxl-3">
                                                    <div class = "card d-block">
                                                        <div class = "card-body">
                                                            <div class = "dropdown card-widgets">
                                                                <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none" data-bs-toggle = "dropdown" aria-expanded = "false">
                                                                    <i class = "dripicons-dots-3"></i>
                                                                </a>
                                                                <div class = "dropdown-menu dropdown-menu-end">
                                                                    <a href = "{{url('/reservation?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                                                        <i class = "mdi mdi-eye me-1"></i>
                                                                        Consulter
                                                                    </a>
                                                                    <a href = "{{url('/edit-reservation?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                                                        <i class = "mdi mdi-pencil me-1"></i>
                                                                        Modifier
                                                                    </a>
                                                                    <a href = "javascript:void(0)" class = "dropdown-item" onclick = "questionAnnulerReservation({{$data->getIdReservationAttribute()}})">
                                                                        <i class = "mdi mdi-delete me-1"></i>
                                                                        Annuler
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class = "mt-0">
                                                                <a href = "javascript:void(0)" class = "text-title">{{$data->titre_livre}}</a>
                                                            </h4>
                                                            <div class = "badge bg-success mb-3 p-2">Réservé</div>
                                                            <p class = "text-muted font-13 mb-3">{{$data->description_livre}}</p>
                                                            <p class = "mb-1">
                                                                <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                                                    <i class= "mdi mdi-account-circle text-muted"></i>
                                                                    <b>Auteur : </b> {{$data->auteur_livre}}
                                                                </span>
                                                            </p>
                                                            <div id = "tooltip-container">
                                                                <a href = "javascript:void(0)" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{auth()->user()->getFullnameUserAttribute()}}" class = "d-inline-block">
                                                                    <img src = "{{URL::asset(auth()->user()->getImageUserAttribute())}}" class = "rounded-circle avatar-xs" alt = "Photo de profil">
                                                                </a>
                                                                <a href = "javascript:void(0)" class = "d-inline-block text-muted fw-bold ms-2">
                                                                    {{auth()->user()->getFullnameUserAttribute()}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class = "mt-3 mb-3">
                                            {{$mes_reservations->links("vendor.pagination.pagination_normal")}}
                                        </div>
                                    @endif
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