<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Modifier le livre | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Modifier le livre</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Modifier le livre</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Modifier le livre</h4>
                                        <p class = "text-muted font-14">
                                            Modifier le livre en ajoutant les nouvelles informations pour un livre.
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
                                        @if(is_null($livre))
                                            <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    Malheureusement, nous n'avons pas trouvé un livre avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @else
                                            <form name = "modifier-livre-form" id = "modifier-livre-form" method = "post" action = "{{url('/modifier-livre')}}" enctype = 'multipart/form-data'>
                                                @csrf
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "titre" class = "form-label">Titre</label>
                                                            <input type = "text" class = "form-control" id = "titre" name = "titre" placeholder = "Saisissez le titre.." value = "{{$livre->getTitreLivreAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "auteur" class = "form-label">Auteur</label>
                                                            <input type = "text" class = "form-control" id = "auteur" name = "auteur" placeholder = "Saisissez l'auteur.." value = "{{$livre->getAuteurLivreAttribute()}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "image" class = "form-label">Image</label>
                                                            <input type = "file" class = "form-control" id = "image" name = "image" placeholder = "Saisissez l'image.."  accept = "image/png, image/gif, image/jpeg">
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "mb-3">
                                                            <label for = "code" class = "form-label">Code</label>
                                                            <input type = "number" class = "form-control" id = "code" name = "code" placeholder = "Saisissez le code.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" value = "{{$livre->getCodeLivreAttribute()}}" required>
                                                        </div>
                                                        @if (session()->has('erreur_code'))
                                                            <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_code')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-12">
                                                        <label for = "description" class = "form-label">Description</label>
                                                        <textarea class = "form-control" name = "description" id = "description" placeholder = "Saisissez le la description.." required>{{$livre->getDescriptionLivreAttribute()}}</textarea>
                                                    </div>
                                                </div>
                                                <input type = "hidden" name = "id_livre" id = "id_livre" value = "{{$_GET['id_livre']}}" required>
                                                <div class = "row mt-3">
                                                    <div class = "col-sm-6"></div>
                                                    <div class = "col-sm-6 text-end">
                                                        <button type = "submit" class = "btn btn-primary">Modifier</button>
                                                    </div>
                                                </div>
                                            </form>
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