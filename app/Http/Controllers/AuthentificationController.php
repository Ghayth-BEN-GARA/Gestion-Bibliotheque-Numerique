<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\EnvoyerMailSignupUser;
    use Hash;
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

            elseif($this->creerNewUser($request->nom, $request->prenom, $request->naissance, $request->adresse, $request->cin, $request->genre, $request->role, $request->email, $request->password)){
                $this->creerJournalAuth("Inscription", "Créez un nouveau compte pour le bibliothécaire en ajoutant les informations nécessaires à l'inscription.", $this->getInformationsUser($request->email)->getIdUserAttribute());
                $this->envoyerMailSignupUser($request->nom, $request->prenom, $request->email, $this->getInformationsUser($request->email)->getDateTimeCreationUserAttribute());
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

        public function envoyerMailSignupUser($nom, $prenom, $email, $date_creation){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'date_creation' => $date_creation
            ];

            return Mail::to($email)->send(new EnvoyerMailSignupUser($mailData));
        }

        public function getInformationsUser($email){
            return User::where("email", "=", $email)->first();
        }
    }
?>
