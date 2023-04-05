<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Livre;

    class LivreController extends Controller{
        public function ouvrirListeLivres(){
            return view("Livres.liste_livres");
        }

        public function ouvrirAddLivre(){
            return view("Livres.add_livre");
        }

        public function gestionCreerLivre(Request $request){
            if($this->verifierSiCodeLivreExist($request->code)){
                return back()->with("erreur_code", "Nous sommes désolés de vous informer que ce code est utilisé pour créer un autre livre.");
            }

            elseif($this->creerLivre($request->titre, $request->auteur, $request->code, $request->image, $request->description)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce livre a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer ce livre pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSiCodeLivreExist($code){
            return Livre::where("code_livre", "=", $code)->exists();
        }

        public function creerLivre($titre, $auteur, $code, $image, $description){
            $livre = new Livre();
            $livre->setCodeLivreAttribute($code);
            $livre->setTitreLivreAttribute($titre);
            $livre->setAuteurLivreAttribute($auteur);
            
            $filename_image = time().$image->getClientOriginalName();
            $path = $image->move('images_livres', $filename_image);

            $livre->setImageLivreAttribute($path);
            $livre->setDescriptionLivreAttribute($description);

            return $livre->save();
        }

        public function gestionDeleteLivre(Request $request){
            if($this->deleteLivre($request->input("id_livre"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce livre a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer ce livre pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteLivre($id_livre){
            return Livre::where("id_livre", "=", $id_livre)->delete();
        }

        public function ouvrirEditLivre(Request $request){
            $livre = $this->getInformationsLivre($request->input("id_livre"));
            return view("Livres.edit_livre", compact("livre"));
        }

        public function getInformationsLivre($id_livre){
            return Livre::where("id_livre", "=", $id_livre)->first();
        }

        public function gestionModifierLivre(Request $request){
            if($this->verifierSiCodeLivreNonActuelExist($request->code, $request->input("id_livre"))){
                return back()->with("erreur_code", "Nous sommes désolés de vous informer que ce code est utilisé pour créer un autre livre.");
            }

            elseif($this->modifierLivre($request->titre, $request->auteur, $request->code, $request->image, $request->description, $request->input("id_livre"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce livre a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier ce livre pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSiCodeLivreNonActuelExist($code, $id_livre){
            return Livre::where("code_livre", "=", $code)->where("id_livre", "<>", $id_livre)->exists();
        }

        public function modifierLivre($titre, $auteur, $code, $image, $description, $id_livre){
            if(is_null($image)){
                return Livre::where("id_livre", "=", $id_livre)->update([
                    "titre_livre" => $titre,
                    "auteur_livre" => $auteur,
                    "code_livre" => $code,
                    "description_livre" => $description
                ]);
            }

            else{
                $filename_image = time().$image->getClientOriginalName();
                $path = $image->move('images_livres', $filename_image);

                return Livre::where("id_livre", "=", $id_livre)->update([
                    "titre_livre" => $titre,
                    "auteur_livre" => $auteur,
                    "code_livre" => $code,
                    "image_livre" => $path
                ]);
            }
        }
    }
?>
