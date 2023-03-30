<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use App\Models\User;
    use App\Models\ReseauSocial;
    use Session;

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
    }
?>
