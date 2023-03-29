<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content="ie=edge">
        <meta http-equiv = "Content-Security-Policy" content = "upgrade-insecure-requests">
        <meta http-equiv = "Content-type" content = "text/html; charset=utf-8"/>
        <link rel = "icon" href = "{{asset('/images/favicon.png')}}">
        <title>Récupération | Université Sesame</title>
    </head>
    <body style = "margin: 0; font-family: Nunito, sans-serif; font-size: 0.9rem; font-weight: 400; line-height: 1.5; color: #6c757d; background-color: #fafbfe; -webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: transparent;">
        <div style = "--bs-gutter-x: 0px; --bs-gutter-y: 0; display: -webkit-box; display: -ms-flexbox; display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -0.5); margin-left: calc(var(--bs-gutter-x) * -0.5);">
            <div style = "-webkit-box-flex: 0; -ms-flex: 0 0 auto; flex: 0 0 auto; width: 100%;">
                <div style = "position: relative; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid #eef2f7; border-radius: 0.25rem;">
                    <div style = "-webkit-box-flex: 1; -ms-flex: 1 1 auto; flex: 1 1 auto; padding: 1.5rem 1.5rem;">
                        <div style = "margin: -1.5rem 0 -1.5rem 250px; padding: 1.5rem 0 1.5rem 25px;">
                            <div style = "margin-top: 1.5rem !important;">
                                <p style = "margin-top: 0; margin-bottom: 1rem;">Bonjour M. {{$mailData['fullname']}}, </p>
                                <p style = "margin-top: 0; margin-bottom: 1rem;">
                                    Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous :
                                    <div style = "text-align: left; padding-top: 15px; padding-bottom: 15px;">
                                        <a href = "http://127.0.0.1:8000/reset-password?token={{$mailData['token']}}&id_user={{$mailData['id_user']}}" style = "text-decoration:none; width: auto; height: 40px; display: inline-block; font-family: Nunito, sans-serif; font-weight: 700; font-size: 14px; padding: 10px; border: none; margin-left:30px; background-color: #29409A; color: #fff; text-align:center; letter-spacing:0.9px;" target = "_blank">Réinitialisez votre mot de passe</a>
                                    </div>
                                </p>
                                <hr style = "margin: 1rem 0; color: inherit; background-color: currentColor; border: 0; opacity: 0.25; height: 1px;">
                                <p style = "margin-top: 0; margin-bottom: 1rem;">
                                    Copyright © <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%B %Y",strtotime(strftime(date('Y-m-d')))));?> <b> Polytechnique des sciences avancées </b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>