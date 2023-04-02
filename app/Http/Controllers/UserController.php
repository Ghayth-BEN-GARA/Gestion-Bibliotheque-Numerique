<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use App\Mail\EnvoyerMailSignupUser;
    use Hash;
    use App\Models\User;
    use App\Models\Etudiant;
    use App\Models\TypeMode;
    use App\Models\ReseauSocial;
    use App\Models\Enseignant;

    class UserController extends Controller{
        public function ouvrirListeUsers(){
            return view("Users.liste_users");
        }

        public function ouvrirAddUser(){
            return view("Users.add_user");
        }

        public function gestionCreerEtudiant(Request $request){
            if(is_null($request->genre)){
                return back()->with("erreur_genre", "Vous devez sélectionner le genre.");
            }

            elseif(!$this->verifierNumeroMobileLength($request->numero)){
                return back()->with("erreur_numero", "Le numéro mobile doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiNumeroMobileExist($request->numero)){
                return back()->with("erreur_numero", "Nous sommes désolés de vous informer que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            elseif(!$this->verifierCinLength($request->cin)){
                return back()->with("erreur_cin", "Le numéro de la carte d'identité doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiCinExist($request->cin)){
                return back()->with("erreur_cin", "Nous sommes désolés de vous informer que ce numéro de carte d'identité est utilisé par un autre utilisateur.");
            }

            elseif($this->verifierSiEmailExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés de vous informer que cette adresse email est utilisée par un autre utilisateur.");
            }

            else if($this->creerNewUser($request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->numero, $request->adresse, $request->cin, $request->email, $request->password, $request->role)){
                $this->creerNewEtudiant($request->matricule, $request->niveau, $this->getIdUserAttribute($request->email));
                $this->envoyerMailCreerUser($request->nom, $request->prenom, $request->email, $request->password);
                $this->creerTypeMode($this->getIdUserAttribute($request->email));
                $this->creerReseauSocial($this->getIdUserAttribute($request->email));
                return back()->with("success", "Nous sommes très heureux de vous informer que cette utilisateur a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer un nouveau utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierNumeroMobileLength($numero){
            return Str::length($numero) == 8;
        }

        public function verifierSiNumeroMobileExist($numero){
            return User::where("mobile", "=", $numero)->exists();
        }

        public function verifierSiCinExist($cin){
            return User::where("cin", "=", $cin)->exists();
        }

        public function verifierSiEmailExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function creerNewUser($nom, $prenom, $date_naissance, $genre, $numero, $adresse, $cin, $email, $password, $role){
            $user = new User();
            $user->setNomUserAttribute($nom);
            $user->setPrenomUserAttribute($prenom);
            $user->setDateNaissanceUserAttribute($date_naissance);
            $user->setGenreUserAttribute($genre);
            $user->setMobileUserAttribute($numero);
            $user->setAdresseUserAttribute($adresse);
            $user->setCinUserAttribute($cin);
            $user->setEmailUserAttribute($email);
            $user->setPasswordUserAttribute(Hash::make($password));
            $user->setRoleUserAttribute($role);
            
            return $user->save();
        }

        public function getIdUserAttribute($email){
            return User::where("email", "=", $email)->orderBy("id_user", "desc")->first()->getIdUserAttribute();
        }

        public function creerNewEtudiant($matricule, $niveau, $id_user){
            $etudiant = new Etudiant();
            $etudiant->setNiveauAttribute($niveau);
            $etudiant->setMatriculeAttribute($matricule);
            $etudiant->setIdUserAttribute($id_user);

            return $etudiant->save();
        }

        public function envoyerMailCreerUser($nom, $prenom, $email, $password){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'password' => $password
            ];

            return Mail::to($email)->send(new EnvoyerMailSignupUser($mailData));
        }

        public function creerTypeMode($id_user){
            $mode = new TypeMode();
            $mode->setIdUserAttribute($id_user);

            return $mode->save();
        }

        public function creerReseauSocial($id_user){
            $reseau = new ReseauSocial();
            $reseau->setIdUserAttribute($id_user);

            return $reseau->save();
        }

        public function gestionCreerEnseignant(Request $request){
            if(is_null($request->genre)){
                return back()->with("erreur_genre", "Vous devez sélectionner le genre.");
            }

            elseif(!$this->verifierNumeroMobileLength($request->numero)){
                return back()->with("erreur_numero", "Le numéro mobile doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiNumeroMobileExist($request->numero)){
                return back()->with("erreur_numero", "Nous sommes désolés de vous informer que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            elseif(!$this->verifierCinLength($request->cin)){
                return back()->with("erreur_cin", "Le numéro de la carte d'identité doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiCinExist($request->cin)){
                return back()->with("erreur_cin", "Nous sommes désolés de vous informer que ce numéro de carte d'identité est utilisé par un autre utilisateur.");
            }

            elseif($this->verifierSiEmailExist($request->email)){
                return back()->with("erreur_email", "Nous sommes désolés de vous informer que cette adresse email est utilisée par un autre utilisateur.");
            }

            elseif($this->creerNewUser($request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->numero, $request->adresse, $request->cin, $request->email, $request->password, $request->role)){
                $this->creerNewEnseignant($request->grade, $request->specialite, $this->getIdUserAttribute($request->email));
                $this->envoyerMailCreerUser($request->nom, $request->prenom, $request->email, $request->password);
                $this->creerTypeMode($this->getIdUserAttribute($request->email));
                $this->creerReseauSocial($this->getIdUserAttribute($request->email));
                return back()->with("success", "Nous sommes très heureux de vous informer que cette utilisateur a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer un nouveau utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function creerNewEnseignant($grade, $specialite, $id_user){
            $enseignant = new Enseignant();
            $enseignant->setGradeAttribute($grade);
            $enseignant->setSpecialiteAttribute($specialite);
            $enseignant->setIdUserAttribute($id_user);

            return $enseignant->save();
        }

        public function gestionSupprimerUser(Request $request){
            if($this->supprimerUser($request->input("id_user"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette utilisateur a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function supprimerUser($id_user){
            return User::where("id_user", "=", $id_user)->delete();
        }

        public function ouvrirUser(Request $request){
            $user = null;
            $links = $this->getLinksReseauxSociaux($request->input("id_user"));

            if($this->getInformationsUser($request->input("id_user"))->getRoleUserAttribute() == "Étudiant"){
                $user = $this->getInformationsUserEtudiant($request->input("id_user"));
            }

            else{
                $user = $this->getInformationsUserEnseignant($request->input("id_user"));
            }
            
            return view("Users.user", compact("user", "links"));
        }

        public function getInformationsUserEtudiant($id_user){
            return User::where("users.id_user", "=", $id_user)
            ->join("etudiants", "etudiants.id_user", "users.id_user")
            ->first();
        }

        public function getInformationsUserEnseignant($id_user){
            return User::where("users.id_user", "=", $id_user)
            ->join("enseignants", "enseignants.id_user", "users.id_user")
            ->first();
        }

        public function getInformationsUser($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }

        public function getLinksReseauxSociaux($id_user){
            return ReseauSocial::where("id_user", "=", $id_user)->first();
        }

        public function ouvrirEditUser(Request $request){
            $user = null;

            if($this->getInformationsUser($request->input("id_user"))->getRoleUserAttribute() == "Étudiant"){
                $user = $this->getInformationsUserEtudiant($request->input("id_user"));
            }

            else{
                $user = $this->getInformationsUserEnseignant($request->input("id_user"));
            }
            
            return view("Users.edit_user", compact("user"));
        }

        public function gestionUpdateEtudiant(Request $request){
            if(!$this->verifierNumeroMobileLength($request->numero)){
                return back()->with("erreur_numero", "Votre numéro mobile doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiNumeroMobileNoActuelExist($request->id_user, $request->numero)){
                return back()->with("erreur_numero", "Nous sommes désolés de vous informer que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            elseif(!$this->verifierCinLength($request->cin)){
                return back()->with("erreur_cin", "Votre numéro de carte d'identité doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiCinNotActuelExist($request->id_user, $request->cin)){
                return back()->with("erreur_cin", "Nous sommes désolés de vous informer que ce numéro de carte d'identité est utilisé par un autre utilisateur.");
            }

            elseif($this->modifierEtudiant($request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->numero, $request->adresse, $request->cin, $request->matricule, $request->niveau, $request->id_user)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette utilisateur a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSiNumeroMobileNoActuelExist($id_user, $numero){
            return User::where("id_user", "<>", $id_user)->where("mobile", "=", $numero)->exists();
        }

        public function verifierCinLength($cin){
            return Str::length($cin) == 8;
        }

        public function verifierSiCinNotActuelExist($id_user, $cin){
            return User::where("id_user", "<>", $id_user)->where("cin", "=", $cin)->exists();
        }

        public function modifierEtudiant($nom, $prenom, $naissance, $genre, $numero, $adresse, $cin, $matricule, $niveau, $id_user){
            return User::join("etudiants", "users.id_user", "=", "etudiants.id_user")
            ->where("users.id_user", "=", $id_user)
            ->update([
                "nom" => $nom,
                "prenom" => $prenom,
                "genre" => $genre,
                "mobile" => $numero,
                "adresse" => $adresse,
                "cin" => $cin,
                "matricule" => $matricule,
                "niveau" => $niveau
            ]);
        }

        public function gestionUpdateEnseignant(Request $request){
            if(!$this->verifierNumeroMobileLength($request->numero)){
                return back()->with("erreur_numero", "Votre numéro mobile doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiNumeroMobileNoActuelExist($request->id_user, $request->numero)){
                return back()->with("erreur_numero", "Nous sommes désolés de vous informer que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            elseif(!$this->verifierCinLength($request->cin)){
                return back()->with("erreur_cin", "Votre numéro de carte d'identité doit être composé de 8 chiffres.");
            }

            elseif($this->verifierSiCinNotActuelExist($request->id_user, $request->cin)){
                return back()->with("erreur_cin", "Nous sommes désolés de vous informer que ce numéro de carte d'identité est utilisé par un autre utilisateur.");
            }

            elseif($this->modifierEnseignant($request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->numero, $request->adresse, $request->cin, $request->specialite, $request->grade, $request->id_user)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette utilisateur a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierEnseignant($nom, $prenom, $naissance, $genre, $numero, $adresse, $cin, $specialite, $grade, $id_user){
            return User::join("enseignants", "users.id_user", "=", "enseignants.id_user")
            ->where("users.id_user", "=", $id_user)
            ->update([
                "nom" => $nom,
                "prenom" => $prenom,
                "genre" => $genre,
                "mobile" => $numero,
                "adresse" => $adresse,
                "cin" => $cin,
                "specialite" => $specialite,
                "grade" => $grade
            ]);
        }
    }
?>
