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
    }
?>
