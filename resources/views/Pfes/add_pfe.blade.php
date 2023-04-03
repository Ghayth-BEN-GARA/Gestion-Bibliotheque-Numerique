<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouveau PFE | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Nouveau PFE</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Nouveau PFE</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouveau PFE</h4>
                                        <p class = "text-muted font-14">
                                            Créez un nouveau PFE en ajoutant les informations requises pour un projet de fin d'étude.
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
                                        <form name = "creer-pfe-form" id = "creer-pfe-form" method = "post" action = "{{url('/creer-pfe')}}" enctype = 'multipart/form-data'>
                                            @csrf
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "titre" class = "form-label">Titre</label>
                                                        <input type = "text" class = "form-control" id = "titre" name = "titre" placeholder = "Saisissez le titre.." required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "pdf" class = "form-label">PDF</label>
                                                        <input type = "file" class = "form-control" id = "pdf" name = "pdf" placeholder = "Saisissez le pdf.."  accept = "application/pdf" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <div class = "mb-3">
                                                        <label for = "description" class = "form-label">Description</label>
                                                        <textarea class = "form-control" name = "description" id = "description" placeholder = "Saisissez la description.." rows = "4" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <div class = "mb-3">
                                                        <select class = "form-select" name = "annee_universitaire" id = "annee_universitaire">
                                                            <option value = "#">Sélectionnez l'année universitaire..</option>
                                                            @if(count($liste_annees_universitaires) == 0)
                                                                <option value = "#" selected disabled>La liste des année universitaire est vide.</option>
                                                            @else
                                                                @foreach($liste_annees_universitaires as $data)
                                                                    <option value = "{{$data->getIdAnneeUniversitaireAttribute()}}">Année universitaire {{$data->getDebutAttribute()}} - {{$data->getFinAttribute()}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    @if (session()->has('erreur_annee'))
                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_annee')}}</p>
                                                    @endif
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
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>