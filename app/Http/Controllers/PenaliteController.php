<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Penalite;

    class PenaliteController extends Controller{
        public function ouvrirPensaliserEtudiant(Request $request){
            $user = $this->getInformationsUser($request->input("id_user"));
            return view("Penalites.penaliser_etudiant", compact("user"));
        }

        public function getInformationsUser($id_user){
            return User::where("id_user", "=", $id_user)
            ->where("role", "=", "Étudiant")
            ->first();
        }
    }
