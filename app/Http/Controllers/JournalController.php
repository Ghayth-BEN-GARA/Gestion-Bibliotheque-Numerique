<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\JournalAuth;

    class JournalController extends Controller{
        public function ouvrirJournal(){
            $liste_journals = $this->getJournalAuthentification(auth()->user()->getIdUserAttribute());
            return view("Journals.liste_journals", compact("liste_journals"));
        }

        public function getJournalAuthentification($id_user){
            return JournalAuth::where("id_user", "=", $id_user)->paginate(10);
        }

        public function gestionSupprimerJournal(){
            if($this->supprimerJournal(auth()->user()->getIdUserAttribute())){
                return back()->with("succes", "Nous sommes très heureux de vous informer que votre journal d'authentification a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer votre journal d'authentification pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function supprimerJournal($id_user){
            return JournalAuth::where("id_user", "=", $id_user)->delete();
        }
    }
?>
