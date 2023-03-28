<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_auth")
        <title>Connexion | Bibliothèque</title>
    </head>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/auth_template/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "login-form" name = "login-form" action = "{{url('/login-user')}}">
                            @csrf
                            <h2>Connexion</h2>
                            <div class = "form-group">
                                <label for = "address_email">Adresse Email :</label>
                                <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse email.." required/>
                            </div>
                            <div class = "form-group">
                                <label for = "mot_de_passe">Mot De Passe :</label>
                                <input type = "password" name = "password" id = "password" placeholder = "Saisissez votre mot de passe.." required/>
                            </div>
                            <div class = "form-row">
                                <div class = "form-check form-radio">
                                    <input class = "form-check-input" type = "checkbox" name = "souviens_de_moi" id = "souviens_de_moi" value = "Souviens De Moi">
                                    <label class = "form-check-label mx-2" for = "souviens_de_moi">Souviens De Moi</label>
                                </div>
                                <div class = "form-group">
                                    <label>
                                        <a href = "#"  class = "text-right">Mot De Passe Oublié ?</a>
                                    </label>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>
                                        Vous n'avez pas de compte ?
                                        <a href = "{{url('/signup')}}"  class = "text-insc">Inscrivez-vous ici.</a>
                                    </label>
                                </div>
                                <div class = "col-md-6" style = "margin-top:-20px">
                                    <div class = "form-submit">
                                        <input type = "submit" value = "Se Connecter" class = "submit" name = "submit" id = "submit" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.scripts_auth")
    </body>
</html>