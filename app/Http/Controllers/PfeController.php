<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Response;
    use App\Models\AnneeUniversitaire;
    use App\Models\Pfe;

    class PfeController extends Controller{
        public function ouvrirListePfes(){
            return view("Pfes.liste_pfes");
        }

        public function ouvrirAddPfe(){
            $liste_annees_universitaires = $this->getListeAnneesUniversitaires();
            return view("Pfes.add_pfe", compact("liste_annees_universitaires"));
        }

        public function getListeAnneesUniversitaires(){
            return AnneeUniversitaire::orderBy("debut", "asc")->get();
        }

        public function gestionCreerPfe(Request $request){
            if(is_null($request->annee_universitaire) || $request->annee_universitaire == "#"){
                return back()->with("erreur_annee", "Vous devez sélectionner l'année universitaire.");
            }

            elseif($this->creerPfe($request->titre, $request->pdf, $request->description, $request->annee_universitaire)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce pfe a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer ce pfe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function creerPfe($titre, $pdf, $description, $annee_universitaire){
            $pfe = new Pfe();
            $pfe->setTitreAttribute($titre);
            
            $filename_pdf = time().$pdf->getClientOriginalName();
            $path = $pdf->move('pdf_pfe', $filename_pdf);

            $pfe->setPdfAttribute($path);
            $pfe->setDescriptionAttribute($description);
            $pfe->setIdAnneeUniversitaireAttribute($annee_universitaire);

            return $pfe->save();
        }

        public function gestionDeletePfe(Request $request){
            if($this->deletePfe($request->input("id_pfe"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce pfe a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer ce pfe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deletePfe($id_pfe){
            return Pfe::where("id_pfe", "=", $id_pfe)->delete();
        }

        public function getInformationsPfe($id_pfe){
            return Pfe::where("id_pfe", "=", $id_pfe)
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "pfes.id_annee_universitaire")
            ->first();
        }

        public function ouvrirPfe(Request $request){
            $pfe = $this->getInformationsPfe($request->input("id_pfe"));
            return view("Pfes.pfe", compact("pfe"));
        }

        public function ouvrirEditPfe(Request $request){
            $pfe = $this->getInformationsPfe($request->input("id_pfe"));
            $liste_annees_universitaires = $this->getListeAnneesUniversitaires();
            return view("Pfes.edit_pfe", compact("pfe", "liste_annees_universitaires"));
        }

        public function gestionModifierPfe(Request $request){
            if(is_null($request->annee_universitaire) || $request->annee_universitaire == "#"){
                return back()->with("erreur_annee", "Vous devez sélectionner l'année universitaire.");
            }

            elseif($this->modifierPfe($request->titre, $request->description, $request->pdf, $request->annee_universitaire, $request->id_pfe)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce pfe a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier ce pfe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierPfe($titre, $description, $pdf, $annee_universitaire, $id_pfe){
            if(is_null($pdf)){
                return Pfe::where("id_pfe", "=", $id_pfe)->update([
                    "titre" => $titre,
                    "description" => $description,
                    "id_annee_universitaire" => $annee_universitaire
                ]);
            }

            else{
                $filename_pdf = time().$pdf->getClientOriginalName();
                $path = $pdf->move('pdf_pfe', $filename_pdf);

                return Pfe::where("id_pfe", "=", $id_pfe)->update([
                    "titre" => $titre,
                    "description" => $description,
                    "id_annee_universitaire" => $annee_universitaire,
                    "pdf" => $path
                ]);
            }
        }
    }
?>
