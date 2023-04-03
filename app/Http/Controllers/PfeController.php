<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
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
    }
?>
