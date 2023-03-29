<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
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
    }
?>
