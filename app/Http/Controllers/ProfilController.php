<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\ReseauSocial;
    use App\Models\Etudiant;
    use Session;
    use Hash;

    class ProfilController extends Controller{
        public function modifierStatusUser(Request $request){
            return User::where("id_user", "=", auth()->user()->getIdUserAttribute())->update([
                "status" => $request->status
            ]);
        }

        public function gestionSupprimerCompte(){
            if($this->supprimerCompte(auth()->user()->getIdUserAttribute())){
                if($this->logoutUser()){
                    return redirect("/")->with("deleted", "Votre compte a été supprimé avec succès aujourd'hui. Si vous pensez qu'il a été supprimé par erreur, veuillez contacter l'administration.");
                }

                else{
                    return redirect("/404"); 
                }
            }

            else{
                return redirect("/404"); 
            }
        }

        public function supprimerCompte($id_user){
            return User::where("id_user", "=", $id_user)->delete();
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

        public function ouvrirProfil(){
            $links_reseaux_sociaux = $this->getLinksReseauxSociaux(auth()->user()->getIdUserAttribute());
            return view("Profils.profil", compact("links_reseaux_sociaux"));
        }

        public function ouvrirEditPhotoProfil(){
            return view("Profils.edit_photo_profil");
        }

        public function gestionModifierPhotoDeProfil(Request $request){
            if($this->modifierPhotoDeProfil(auth()->user()->getIdUserAttribute(), $request)){
                return back()->with("success", "Nous sommes très heureux de vous informer que votre photo de profil a a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre photo de profil pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierPhotoDeProfil($id_user, $request){
            $filename = time().$request->file('file')->getClientOriginalName();
            $path = $request->file->move('images_profils/'.$id_user, $filename);

            return User::where('id_user', '=', $id_user)->update([
                'image' => $path
            ]);
        }

        public function getLinksReseauxSociaux($id_user){
            return ReseauSocial::where("id_user", "=", $id_user)->first();
        }

        public function gestionModifierInformationsBasique(Request $request){
            if(!$this->verifierNumeroMobileLength($request->numero)){
                return back()->with("erreur", "Votre numéro mobile doit être composé de 8 chiffres.");
            }

            else if($this->verifierSiNumeroMobileExist(auth()->user()->getEmailUserAttribute(), $request->numero)){
                return back()->with("erreur", "Nous sommes désolés de vous informer que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            else if($this->verifierSiCinExist(auth()->user()->getEmailUserAttribute(), $request->cin)){
                return back()->with("erreur", "Nous sommes désolés de vous informer que ce numéro de carte d'identité est utilisé par un autre utilisateur.");
            }

            else if($this->modifierInformationsBasique($request->email, $request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->numero, $request->adresse, $request->cin)){
                return back()->with("success", "Nous sommes très heureux de vous informer que vos informations ont été modifiées avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier vos informations pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierNumeroMobileLength($numero){
            return Str::length($numero) == 8;
        }

        public function verifierSiNumeroMobileExist($email, $numero){
            return User::where("email", "<>", $email)->where("mobile", "=", $numero)->exists();
        }

        public function verifierSiCinExist($email, $cin){
            return User::where("email", "<>", $email)->where("cin", "=", $cin)->exists();
        }

        public function modifierInformationsBasique($email, $nom, $prenom, $date_naissance, $genre, $numero, $adresse, $cin){
            return User::where("email", "=", $email)->update([
                "nom" => $nom,
                "prenom" => $prenom,
                "date_naissance" => $date_naissance,
                "genre" => $genre,
                "mobile" => $numero,
                "adresse" => $adresse,
                "cin" => $cin
            ]);
        }

        public function gestionModifierReseauxSociaux(Request $request){
            if($this->modifierReseauxSociaux(auth()->user()->getIdUserAttribute(), $request->facebook, $request->instagram, $request->github, $request->linkedin)){
                return back()->with("success", "Nous sommes très heureux de vous informer que les liens des réseaux sociaux ont été modifiées avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier les liens des réseaux sociaux pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierReseauxSociaux($id_user, $facebook, $instagram, $github, $linkedin){
            return ReseauSocial::where("id_user", "=", $id_user)->update([
                "link_facebook" => $facebook,
                "link_instagram" => $instagram,
                "link_github" => $github,
                "link_linkedin" => $linkedin
            ]);
        }

        public function gestionModifierEmail(Request $request){
            if($this->verifierSiEmailExist(auth()->user()->getIdUserAttribute(), $request->email)){
                return back()->with("erreur", "Nous sommes désolés de vous informer que cette adresse email est utilisé par un autre utilisateur.");
            }

            elseif($this->modifierEmail(auth()->user()->getIdUserAttribute(), $request->email)){
                return back()->with("success", "Nous sommes très heureux de vous informer que l'adresse email a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier l'adresse email pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSiEmailExist($id_user, $email){
            return User::where("id_user", "<>", $id_user)->where("email", "=", $email)->exists();
        }

        public function modifierEmail($id_user, $email){
            return User::where("id_user", "=", $id_user)->update([
                "email" => $email
            ]);
        }

        public function gestionModifierPassword(Request $request){
            if($this->verifierEgalitePassword($request->password, $request->confirm_password)){
                return back()->with("erreur", "Les deux mots de passe saisis ne sont pas identiques.");
            }

            else if($this->verifierAncienPasswordSaisie(auth()->user()->getEmailUserAttribute(), $request->password)){
                return back()->with("erreur", "Vous avez saisi votre ancien mot de passe.");
            }

            else if($this->modifierPassword(auth()->user()->getIdUserAttribute(), $request->password)){
                return back()->with("success", "Nous sommes très heureux de vous informer que votre mot de passe a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre mot de passe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierEgalitePassword($new_password, $confirm_password){
            return strcmp($new_password, $confirm_password);
        }

        public function verifierAncienPasswordSaisie($email, $password){
            $credentials = [
                'email' => $email,
                'password' => $password
            ];

            return Auth::attempt($credentials);
        }

        public function modifierPassword($id_user, $password){
            return User::where("id_user", "=", $id_user)->update([
                "password" => bcrypt($password)
            ]);
        }

        public static function getInformationsEtudiants($id_user){
            return Etudiant::where("id_user", "=", $id_user)->first();
        }

        public function gestionModifierEtudiant(Request $request){
            if($this->modifierEtudiant($request->niveau, $request->matricule, auth()->user()->getIdUserAttribute())){
                return back()->with("success", "Nous sommes très heureux de vous informer que vos informations a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier vos informations. Veuillez réessayer plus tard.");
            }
        }

        public function modifierEtudiant($niveau, $matricule, $id_user){
            return Etudiant::where("id_user", "=", $id_user)->update([
                "niveau" => $niveau,
                "matricule" => $matricule
            ]);
        }
    }
?>
