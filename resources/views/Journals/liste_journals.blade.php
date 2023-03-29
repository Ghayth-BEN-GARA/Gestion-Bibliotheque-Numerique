<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Journal d'authentification | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Journal d'authentification</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Journal d'authentification</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Journal d'authentification</h4>
                                        <p class = "text-muted font-14">
                                            Le journal d'authentification est un espace qui vous permet de voir les actions d'authentification créées par votre compte. Si vous le souhaitez, vous pouvez effacer votre journal d'authentification en cliquant sur <b class = "text-decoration-underline text-danger" style = "cursor:pointer" onclick = "questionSupprimerJournalAuthentification()">Vider le journal</b>.
                                        </p>
                                        @if(Session()->has("erreur"))
                                            <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('erreur')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @elseif(Session()->has("succes"))
                                            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('succes')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @endif
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "responsive-preview">
                                                <div class = "table-responsive">
                                                    <table class = "table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope = "col">#</th>
                                                                <th scope = "col">Action</th>
                                                                <th scope = "col">Description</th>
                                                                <th scope = "col">Date</th>
                                                                <th scope = "col">Heure</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!empty($liste_journals) && ($liste_journals->count()))
                                                                <?php $compteur = 1; ?>
                                                                @foreach($liste_journals as $data)
                                                                    <tr>
                                                                        <th scope = "row">{{$compteur++}}</th>
                                                                        <td>{{$data->getTitleAttribute()}}</td>
                                                                        <td>{{$data->getDescriptionAttribute()}}</td>
                                                                        <td class = "text-capitalize">
                                                                            <?php 
                                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                                echo utf8_encode($data->getFormattedDateTimeJournalAuthAttribute());
                                                                            ?>
                                                                        </td>
                                                                        <td>{{date('H:i',strtotime($data->getDateTimeJournalAuthAttribute()))}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan = "5" class = "text-center">Votre journal d'authentification est toujours vide.</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class = "mt-3 mb-3">
                                                    {{$liste_journals->links("vendor.pagination.pagination_normal")}}
                                                </div>
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