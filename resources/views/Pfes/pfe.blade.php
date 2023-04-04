<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>PFE | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">PFE</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">PFE</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">PFE</h4>
                                        <p class = "text-muted font-14">
                                            Consultation des informations de ce PFE qui est enregistré dans notre système.
                                        </p>
                                        @if($pfe != null)
                                            <table class = "table table-bordered table-centered mb-0">
                                                <thead>
                                                    <tr class = "text-center">
                                                        <th>Identifiant</th>
                                                        <th>Titre</th>
                                                        <th>Description</th>
                                                        <th>Date de création</th>
                                                        <th>Année universitaire</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class = "text-center">
                                                        <td>{{$pfe->getIdPfeAttribute()}}</td>
                                                        <td>{{$pfe->getTitreAttribute()}}</td>
                                                        <td>{{$pfe->getDescriptionAttribute()}}</td>
                                                        <td class = "text-capitalize">
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode($pfe->getFormattedDateCreationPdfAttribute())
                                                            ?>
                                                        </td>
                                                        <td>{{$pfe->debut}} - {{$pfe->fin}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class = "mapouter mt-3">
                                                <div class = "gmap_canvas">
                                                    <iframe width = "100%" height = "1000" src = "{{$pfe->getPdfAttribute()}}#toolbar=0&navpanes=0&embedded=true" frameborder = "0" scrolling = "no" marginheight = "0" marginwidth = "0"></iframe>
                                                    <br>
                                                    <style>
                                                        .mapouter{
                                                            position:relative;
                                                            height:100%;
                                                            width:100%;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        @else
                                            <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    Malheureusement, nous n'avons pas trouvé un projet de fin d'étude avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
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