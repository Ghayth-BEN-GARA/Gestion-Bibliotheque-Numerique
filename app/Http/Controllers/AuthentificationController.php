<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use App\Mail\EnvoyerMailLinkResetPassword;
    use Hash;
    use Session;
    use App\Models\Genre;
    use App\Models\Acteur;
    use App\Models\User;
    use App\Models\JournalAuth;
    use App\Models\LinkResetPassword;

    class AuthentificationController extends Controller{
        public function ouvrirLogin(){
            return view("Authentifications.login");
        }

        public function ouvrirSignup(){
            $genres = $this->getListeGenres();
            $acteurs = $this->getListeActeurs();
            return view("Authentifications.signup", compact("genres", "acteurs"));
        }

        public function getListeGenres(){
            return Genre::orderBy("sexe", "asc")->get();
        }

        public function getListeActeurs(){
            return Acteur::orderBy("nom_acteur", "asc")->get();
        }

        public function verifierIfUserExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function creerJournalAuth($title, $description, $id_user){
            $journal = new JournalAuth();
            $journal->setTitleAttribute($title);
            $journal->setDescriptionAttribute($description);
            $journal->setIdUserAttribute($id_user);

            return $journal->save();
        }

        public function getInformationsUser($email){
            return User::where("email", "=", $email)->first();
        }

        public function gestionLoginUser(Request $request){
            if(!$this->verifierIfUserExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés ! Nous n'avons pas trouvé votre compte.");
            }

            elseif(!$this->verifierEmailPasswordValide($request->email, $request->password)){
                return back()->with("erreur_password", "Une erreur s'est produite lors de la tentative de connexion. Vérifier votre mot de passe et réessayer une autre fois.");
            }

            elseif($this->creerJournalAuth("Connexion", "Connectez-vous au système en entrant votre adresse e-mail et votre mot de passe.", $this->getInformationsUser($request->email)->getIdUserAttribute())){
                $this->creerSessionUser($request->email);
                return redirect("/dashboard");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas vous s'authentifier pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierEmailPasswordValide($email, $password){
            $credentials = request(['email', 'password']);
            return Auth::attempt($credentials);
        }

        public function creerSessionUser($email){
            Session::put('email', $email);
        }

        public function ouvrirForgetPassword(){
            return view("Authentifications.forget_password");
        }

        public function gestionEnvoyerLienForgetPassword(Request $request){
            $token = $this->generateToken();

            if(!$this->verifierIfUserExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés ! Nous n'avons pas trouvé votre compte.");
            }

            else if($this->sendMailLinkResetPassword($this->getInformationsUser($request->email)->getNomUserAttribute(), $this->getInformationsUser($request->email)->getPrenomUserAttribute(), $request->email, $token, $this->getInformationsUser($request->email)->getIdUserAttribute())){
                if($this->verifierIfLinkResetPasswordExist($this->getInformationsUser($request->email)->getIdUserAttribute())){
                    $this->updateLinkResetPassword($this->getInformationsUser($request->email), $token);
                    return back()->with("success", "Un email a été envoyé à l'adresse ".$request->email.". Veuillez rechercher dans votre boite de réception l'e-mail reçue et cliquez sur le lien inclus pour réinitialiser votre mot de passe.");
                }

                else{
                    $this->creerLinkResetPassword($this->getInformationsUser($request->email)->getIdUserAttribute(), $token);
                    return back()->with("success", "Un email a été envoyé à l'adresse ".$request->email.". Veuillez rechercher dans votre boite de réception l'e-mail reçue et cliquez sur le lien inclus pour réinitialiser votre mot de passe.");
                }
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas recevoir l'email pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function generateToken(){
            return Str::random(64);
        }

        public function sendMailLinkResetPassword($nom, $prenom, $email, $token, $id_user){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'token' => $token,
                'id_user' => $id_user
                
            ];
    
            return Mail::to($email)->send(new EnvoyerMailLinkResetPassword($mailData));
        }

        public function creerLinkResetPassword($id_user, $token){
            $link = new LinkResetPassword();
            $link->setTokenAttribute($token);
            $link->setIdUserAttribute($id_user);

            return $link->save();
        }

        public function updateLinkResetPassword($id_user, $token){
            return LinkResetPassword::where("id_user", "=", $id_user)->update([
                "token" => $token,
                "date_time_creation_link" => now()
            ]);
        }

        public function verifierIfLinkResetPasswordExist($id_user){
            return LinkResetPassword::where("id_user", "=", $id_user)->exists();
        }

        public function ouvrirResetPassword(Request $request){
            $token = $request->token;
            $id_user = $request->input('id_user');
            $check_token = $this->verifierIfTokenResetPasswordExist($id_user, $token);
            return view("Authentifications.reset_password", compact("token", "id_user", "check_token"));
        }

        public function verifierIfTokenResetPasswordExist($id_user, $token){
            return LinkResetPassword::where("id_user", "=", $id_user)->where("token", "=", $token)->exists();
        }

        public function gestionResetCompte(Request $request){
            if($this->verifierIfAncienPasswordSaisie($request->id_user, $request->password)){
                return back()->with("erreur_password", "Vous avez saisi votre ancien mot de passe.");
            }

            elseif($request->password != $request->repeate_password){
                return back()->with("erreur_password", "Les deux mots de passe saisis ne sont pas identiques.")->with("erreur_repeat_password", "Les deux mots de passe saisis ne sont pas identiques.");
            }

            elseif($this->updatePasswordUser($request->id_user, $request->password)){
                $this->creerJournalAuth("Réinitialisation du mot de passe", "Récupérez votre compte en suivant le processus de réinitialisation du mot de passe.", $request->id_user);
                return redirect('/')->with('success', 'Nous sommes très heureux de vous informer que votre mot de passe a a été réinitialisé avec succès. Connectez-vous maintenant avec vos nouveaux paramétres de connexion.');
            }
        }

        public function verifierIfAncienPasswordSaisie($id_user, $password){
            $credentials = [
                'id_user' => $id_user,
                'password' => $password
            ];

            return Auth::attempt($credentials);
        }

        public function updatePasswordUser($id_user, $password){
            return User::where("id_user", "=", $id_user)->update([
                "password" => Hash::make($password)
            ]);
        }

        public function gestionLogout(){
            if($this->creerJournalAuth("Déconnexion", "Femer la session utilisateur et sortie de l'application.", auth()->user()->getIdUserAttribute())){
                if($this->logoutUser()){
                    return redirect("/");
                }

                else{
                    return redirect("/404");
                }
            }
        }

        public function logoutUser(){
            Session::forget('email');
            Session::flush();
            auth()->logout();

            if (!Session::has('email')){
                return true;
            }

            else{
                return false;
            }
        }
    }
?>
