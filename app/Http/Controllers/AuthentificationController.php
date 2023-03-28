<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\EnvoyerMailSignupUser;
    use Hash;
    use Session;
    use App\Models\Genre;
    use App\Models\Acteur;
    use App\Models\User;
    use App\Models\JournalAuth;

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

        public function gestionSignupUser(Request $request){
            if(!$this->validerCinLength($request->cin)){
                return back()->with("erreur_cin", "Le numéro CIN doit être composé de 8 chiffres.");
            }

            elseif(is_null($request->genre)){
                return back()->with("erreur_genre", "Vous n'avez pas à choisir votre genre.");
            }

            elseif(is_null($request->role)){
                return back()->with("erreur_role", "Vous n'avez pas à choisir votre rôle.");
            }

            elseif($this->verifierIfUserExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés ! Un autre compte est déjà créé avec cette adresse email.");
            }

            elseif($this->creerNewUser($request->nom, $request->prenom, $request->date_naissance, $request->adresse, $request->cin, $request->genre, $request->role, $request->email, $request->password)){
                $this->creerJournalAuth("Inscription", "Créez un nouveau compte pour le bibliothécaire en ajoutant les informations nécessaires à l'inscription.", $this->getInformationsUser($request->email)->getIdUserAttribute());
                $this->envoyerMailSignupUser($request->nom, $request->prenom, $request->email);
                return redirect("/")->with("success", "Nous sommes très heureux de vous informer que votre compte a été créé avec succès. Veuillez vous authentifier pour l'utiliser normalement.");
            }
        }

        public function validerCinLength($cin){
            return Str::length($cin) == 8;
        }

        public function verifierIfUserExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function creerNewUser($nom, $prenom, $naissance, $adresse, $cin, $genre, $role, $email, $password){
            $user = new User();
            $user->setNomUserAttribute($nom);
            $user->setPrenomUserAttribute($prenom);
            $user->setDateNaissanceUserAttribute($naissance);
            $user->setGenreUserAttribute($genre);
            $user->setRoleUserAttribute($role);
            $user->setAdresseUserAttribute($adresse);
            $user->setCinUserAttribute($cin);
            $user->setEmailUserAttribute($email);
            $user->setPasswordUserAttribute(Hash::make($password));

            return $user->save();
        }

        public function creerJournalAuth($title, $description, $id_user){
            $journal = new JournalAuth();
            $journal->setTitleAttribute($title);
            $journal->setDescriptionAttribute($description);
            $journal->setIdUserAttribute($id_user);

            return $journal->save();
        }

        public function envoyerMailSignupUser($nom, $prenom, $email){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom
            ];

            return Mail::to($email)->send(new EnvoyerMailSignupUser($mailData));
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
    }
?>
