<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouvelle année universitaire | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Nouvelle année universitaire</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Nouvelle année universitaire</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouvelle année universitaire</h4>
                                        <p class = "text-muted font-14">
                                            Créez une nouvelle année universitaire en ajoutant la date de début et la date date de fin.
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
                                        <form name = "creer-annee-universitaire-form" id = "creer-annee-universitaire-form" method = "post" action = "{{url('/creer-annee-univeritaire')}}">
                                            @csrf
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "debut" class = "form-label">Début</label>
                                                        <input type = "number" class = "form-control" id = "debut" name = "debut" placeholder = "Saisissez la date de début.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                    </div>
                                                    @if (session()->has('erreur_debut'))
                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_debut')}}</p>
                                                    @endif
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "fin" class = "form-label">Fin</label>
                                                        <input type = "number" class = "form-control" id = "fin" name = "fin" placeholder = "Saisissez la date de fin.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                    </div>
                                                    @if (session()->has('erreur_fin'))
                                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_fin')}}</p>
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