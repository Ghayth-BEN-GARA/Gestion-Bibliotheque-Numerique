<!DOCTYPE html>
<html lang = "en">
    <head>
	    <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content="ie=edge">
        <meta http-equiv = "Content-Security-Policy" content = "upgrade-insecure-requests">
        <meta http-equiv = "Content-type" content = "text/html; charset=utf-8"/>
        <link rel = "icon" href = "{{asset('/images/favicon.png?v=2')}}">
        <title>Page Introuvable | Bibliothèque</title>
	    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Nunito:400,700">
	    <link rel = "stylesheet" href = "{{asset('/errors/css/style.css')}}" />
    </head>
    <body>
	    <div id = "notfound">
		    <div class = "notfound">
			    <div class = "notfound-404"></div>
                <h1>404</h1>
                <h2>Oops! Page introuvable</h2>
                <p>Désolé mais la page que vous recherchez n'existe pas, elle a été supprimée. le nom a changé ou est temporairement indisponible.</p>
                @if (Session::has('email'))
                    <a href = "{{url('/dashboard')}}">Retour à la page d'accueil</a>
                @else
                    <a href = "{{url('/dashboard')}}">Retour à la page d'authentification</a>
                @endif
            </div>
        </div>
    </body>
</html>
