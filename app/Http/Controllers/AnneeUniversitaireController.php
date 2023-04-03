<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\AnneeUniversitaire;

    class AnneeUniversitaireController extends Controller{
        public function ouvrirListeAnneesUniversitaire(){
            return view("AnneesUniversitaires.liste_annees_universitaire");
        }

        public function ouvrirAddAnneeUniversitaire(){
            return view("AnneesUniversitaires.add_annee_universitaire");
        }

        public function gestionCreerAnneeUniversitaire(Request $request){
            if($this->verifierSiDebutAnneeUniversitaireExiste($request->debut)){
                return back()->with("erreur_debut", "Nous sommes désolés de vous informer que cette année universitaire est déjà créé.");
            }

            else if($request->fin <> $request->debut + 1){
                return back()->with("erreur_fin", "Nous sommes désolés de vous informer que la date de fin entrée n'est pas valide.");
            }

            else if($this->creerAnneeUniversitaire($request->debut, $request->fin)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette année unviversitaire a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette année universitaire pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSiDebutAnneeUniversitaireExiste($debut){
            return AnneeUniversitaire::where("debut", "=", $debut)->exists();
        }

        public function creerAnneeUniversitaire($debut, $fin){
            $annee = new AnneeUniversitaire();
            $annee->setDebutAttribute($debut);
            $annee->setFinAttribute($fin);

            return $annee->save();
        }
    }
?>
