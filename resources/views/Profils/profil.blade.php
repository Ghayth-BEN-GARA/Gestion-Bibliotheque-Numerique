<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Profil | Bibliothèque</title>
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
                                            <li class = "breadcrumb-item active">Profil</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Profil</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-xl-4 col-lg-5">
                                <div class = "card text-center">
                                    <div class = "card-body">
                                        <img src = "{{URL::asset(auth()->user()->getImageUserAttribute())}}" class = "rounded-circle avatar-lg img-thumbnail" alt = "Photo de profil">
                                        <h4 class = "mb-0 mt-2">{{auth()->user()->getFullnameUserAttribute()}}</h4>
                                        <p class = "text-muted font-14">{{auth()->user()->getRoleUserAttribute()}}</p>
                                        <a href = "{{url('/edit-photo-profil')}}" class = "btn btn-success btn-sm mb-2">Modifier la photo de profil</a>
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