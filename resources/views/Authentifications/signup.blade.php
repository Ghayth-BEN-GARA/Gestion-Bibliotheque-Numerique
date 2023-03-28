<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_auth")
        <title>Inscription | Bibliothèque</title>
    </head>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/auth_template/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "register-form" name = "register-form" action = "{{url('/signup-user')}}">
                            @csrf
                            <h2>Inscription</h2>
                            <div class = "form-row">
                                <div class = "form-group">
                                    <label for = "nom">Nom :</label>
                                    <input type = "text" name = "nom" id = "nom" placeholder = "Saisissez votre nom.." required/>
                                </div>
                                <div class = "form-group">
                                    <label for = "prenom">Prénom :</label>
                                    <input type = "text" name = "prenom" id = "prenom" placeholder = "Saisissez votre prénom.." required/>
                                </div>
                            </div>
                            <div class = "form-group mx-3">
                                <label for = "date_naissance">Date de naissance :</label>
                                <input type = "date" name = "date_naissance" id = "date_naissance" required/>
                            </div>
                            <div class = "form-row">
                                <div class = "form-group">
                                    <label for = "adresse">Adresse :</label>
                                    <input type = "text" name = "adresse" id = "adresse" placeholder = "Saisissez votre adresse.." required/>
                                </div>
                                <div class = "form-group">
                                    <label for = "adresse">CIN :</label>
                                    <input type = "number" name = "cin" id = "cin" placeholder = "Saisissez votre cin.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required/>
                                    @if (session()->has('erreur_cin'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_cin')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class = "form-row">
                                <div class = "form-group">
                                    <label for = "genre">Genre :</label>
                                    <div class = "form-select">
                                        <select name = "genre" id = "genre" required>
                                            <option value = "#" disabled selected>Votre genre..</option>
                                            @if(empty($genres))
                                                <option value = "#" disabled selected>Aucun genre actuellement enregistré sur l'application.</option>
                                            @else
                                                @foreach($genres as $data)
                                                    <option value = "{{$data->getSexeAttribute()}}">{{$data->getSexeAttribute()}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class = "select-icon">
                                            <i class = "zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                    @if (session()->has('erreur_genre'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_genre')}}</p>
                                    @endif
                                </div>
                                <div class = "form-group">
                                    <label for = "role">Rôle :</label>
                                    <div class = "form-select">
                                        <select name = "role" id = "role" required>
                                            <option value = "#" disabled selected>Votre rôle..</option>
                                            @if(empty($acteurs))
                                                <option value = "#" disabled selected>Aucun rôle actuellement enregistré sur l'application.</option>
                                            @else
                                                @foreach($acteurs as $data)
                                                    <option value = "{{$data->getNomActeurAttribute()}}">{{$data->getNomActeurAttribute()}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class = "select-icon">
                                            <i class = "zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                    @if (session()->has('erreur_role'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_role')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class = "form-row">
                                <div class = "form-group">
                                    <label for = "adresse">Adresse email :</label>
                                    <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre email.." required/>
                                    @if (session()->has('erreur_email'))
                                        <p class = "text-danger mt-2 mb-2">{{session()->get('erreur_email')}}</p>
                                    @endif
                                </div>
                                <div class = "form-group">
                                    <label for = "password">Mot de passe :</label>
                                    <input type = "password" name = "password" id = "password" placeholder = "Saisissez votre password.." required/>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>
                                        Vous avez déjà un compte ?
                                        <a href = "{{url('/')}}"  class = "text-insc">Connectez-vous ici.</a>
                                    </label>
                                </div>
                                <div class = "col-md-6" style = "margin-top:-20px">
                                    <div class = "form-submit">
                                        <input type = "submit" value = "S'inscrire" class = "submit" name = "submit" id = "submit" />
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