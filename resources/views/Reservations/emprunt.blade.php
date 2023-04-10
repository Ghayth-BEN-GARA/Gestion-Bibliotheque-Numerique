<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Emprunt | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Emprunt</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Emprunt</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
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
                                            <div class = "clearfix">
                                                <div class = "float-start mb-3">
                                                    <img src = "{{URL::asset('/images/favicon.png')}}" alt = "Logo de l'IPSAS" height = "58">
                                                </div>
                                                <div class = "float-end">
                                                    <h4 class = "m-0 d-print-none mt-4">Emprunt</h4>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-sm-6">
                                                    <div class = "float-end mt-3">
                                                        <p>
                                                            <b>Bonjour @if(auth()->user()->getRoleUserAttribute() != "Bibliothécaire") {{auth()->user()->getFullnameUserAttribute()}} @else {{$reservation->prenom}} {{$reservation->nom}} @endif</b>
                                                        </p>
                                                        <p class = "text-muted font-13">
                                                            Veuillez trouver ci-dessous une description détaillée de la réservation choisie. Merci de respecter la date de retour du livre réservé et n'hésitez pas à nous contacter si vous avez des questions.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class = "col-sm-4 offset-sm-2">
                                                    <div class = "mt-3 float-sm-end">
                                                        <p class = "font-13">
                                                            <strong>Date de réservation :</strong>
                                                            &nbsp;&nbsp;&nbsp; 
                                                            <span class = "text-capitalize float-end">
                                                                <?php
                                                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                    echo utf8_encode($reservation->getFormattedDatePretAttribute())
                                                                ?>
                                                            </span>
                                                        </p>
                                                        <p class = "font-13">
                                                            <strong>Date de retour: </strong>
                                                            @if($reservation->getIsReturnedAttribute() == true)
                                                                <span class = "text-capitalize float-end">
                                                                    <?php
                                                                        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                        echo utf8_encode($reservation->getFormattedDateRetourAttribute())
                                                                    ?>
                                                                </span>
                                                            @else
                                                                <span class = "text-capitalize float-end">
                                                                    Pas encore
                                                                </span>
                                                            @endif
                                                        </p>
                                                        <p class = "font-13">
                                                            <strong>Status: </strong>
                                                            @if($reservation->getIsReturnedAttribute() == true)
                                                                <span class = "badge bg-success float-end p-1">Retourné</span>
                                                            @else
                                                                <span class = "badge bg-danger float-end p-1">Non retourné</span>
                                                            @endif
                                                        </p>
                                                        <p class = "font-13">
                                                            <strong>Identifiant: </strong>
                                                            <span class = "float-end">{{$reservation->getIdReservationAttribute()}}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row mt-4">
                                                <div class = "col-sm-4">
                                                    <h6>IPSAS</h6>
                                                    <address>
                                                        Avenue 5 Août Rue Saîd Aboubaker 3002 Sfax-Tunisie
                                                        <br>
                                                        contact@ipsas-ens.net
                                                    </address>
                                                </div>
                                                <div class = "col-sm-4">
                                                    <h6>@if(auth()->user()->getRoleUserAttribute() != "Bibliothécaire") {{auth()->user()->getFullnameUserAttribute()}} @else {{$reservation->prenom}} {{$reservation->nom}} @endif</h6>
                                                    <address>
                                                    @if(auth()->user()->getRoleUserAttribute() != "Bibliothécaire") {{auth()->user()->getAdresseUserAttribute()}} @else {{$reservation->adresse}} @endif
                                                        <br>
                                                        @if(auth()->user()->getRoleUserAttribute() != "Bibliothécaire") {{auth()->user()->getEmailUserAttribute()}} @else {{$reservation->email}} @endif
                                                    </address>
                                                </div>
                                                <div class = "col-sm-4">
                                                    <div class = "text-sm-end">
                                                        <img src = "@if(auth()->user()->getRoleUserAttribute() != 'Bibliothécaire') {{auth()->user()->getImageUserAttribute()}} @else {{$reservation->image}} @endif" alt = "Photo de profil" class = "rounded-circle avatar-lg img-thumbnail me-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-12">
                                                    <div class = "table-responsive">
                                                        <table class="table mt-4">
                                                            <thead>
                                                                <tr>
                                                                    <th>Livre</th>
                                                                    <th>Code</th>
                                                                    <th>Auteur</th>
                                                                    <th class = "text-end">Description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$reservation->titre_livre}}</td>
                                                                    <td>{{$reservation->code_livre}}</td>
                                                                    <td>{{$reservation->auteur_livre}}</td>
                                                                    <td class = "text-end">{{$reservation->description_livre}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "d-print-none mt-4">
                                                <div class = "text-end">
                                                    <a href = "javascript:window.print()" class = "btn btn-primary">
                                                        <i class = "mdi mdi-printer"></i> 
                                                        Imprimer
                                                    </a>
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