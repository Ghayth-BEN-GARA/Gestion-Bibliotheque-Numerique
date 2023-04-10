<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Penalite;
    use App\Models\User;

    class PenaliteController extends Controller{
        public function ouvrirPensaliserEtudiant(Request $request){
            $user = $this->getInformationsUser($request->input("id_user"));
            $verifier_penalite = $this->verifierSipenaliteExiste($request->input("id_user"));
            return view("Penalites.penaliser_etudiant", compact("user", "verifier_penalite"));
        }

        public function verifierSipenaliteExiste($id_user){
            return Penalite::where("id_user", "=", $id_user)
            ->exists();
        }

        public function getInformationsUser($id_user){
            return User::where("id_user", "=", $id_user)
            ->where("role", "=", "Étudiant")
            ->first();
        }

        public function ouvrirListeUsersPenaliser(){
            return view("Penalites.liste_users_penaliser");
        }

        public function gestionCreerPenalisationEtudiant(Request $request){
            if($this->creerPenaliteEtudiant($request->id_user, $request->nbr_jours)){
                return back()->with("success", "Nous sommes très heureux de vous informer que vous avez pénalisé l'étudiant avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas pénaliser l'étudiant pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function creerPenaliteEtudiant($id_user, $nbr_jours){
            $penalite = new Penalite();
            $penalite->setIdUserAttribute($id_user);
            $penalite->setNbrJourAttribute($nbr_jours);

            return $penalite->save();
        }
    }
