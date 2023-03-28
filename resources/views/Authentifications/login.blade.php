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

                </div>
            </div>
        </div>
        @include("Layouts.scripts_auth")
    </body>
</html>