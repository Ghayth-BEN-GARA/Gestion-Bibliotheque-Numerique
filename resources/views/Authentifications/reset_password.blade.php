<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_auth")
        <title>Réinitialisation | Bibliothèque</title>
    </head>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/auth_template/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "update-password-form" name = "update-password-form" action = "{{url('/reset-compte')}}">
                            @csrf
                            <h2>Réinitialisation</h2>
                            <p class = "text-muted mb-4">
                                Merci de saisir un nouveau mot de passe pour accéder à votre compte.
                            </p>
                            @if(!$check_token || $token != $_GET['token'] || $id_user != $_GET['id_user'])
                                <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                    <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                        <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span class = "d-flex justify-content-start">
                                        Assurez-vous que vous avez cliqué sur le bon lien de récupération et réessayez.
                                    </span>
                                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                </div>
                            @else
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
                                @endif
                                <div class = "form-group">
                                    <label for = "password">Mot de passe :</label>
                                    <input type = "password" name = "password" id = "password" placeholder = "Saisissez votre nouveau mot de passe.." required/>
                                    @if (session()->has('erreur_password'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_password')}}</p>
                                    @endif
                                </div>
                                <div class = "form-group">
                                    <label for = "repeate_password">Répétez le mot de passe :</label>
                                    <input type = "password" name = "repeate_password" id = "repeate_password" placeholder = "Répétez votre nouveau mot de passe.." required/>
                                    @if (session()->has('erreur_repeat_password'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_repeat_password')}}</p>
                                    @endif
                                </div>
                                <div class = "form-group">
                                    <div class = "form-row">
                                        <a href = "{{url('/')}}" class = "text mx-3">Authentification</a>
                                        <span> | </span>
                                        <a href = "{{url('/forget-password')}}" class = "text mx-3">Récupération</a>
                                    </div>
                                </div>
                                <input type = "hidden" name = "id_user" id = "id_user" value = "{{$_GET['id_user']}}" required/>
                                <div class = "form-submit">
                                    <input type = "submit" value = "Réinitialiser" class = "submit" name = "submit" id = "submit" />
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.scripts_auth")
    </body>
</body>