<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Genre;
    use App\Models\Acteur;

    class AuthentificationController extends Controller{
        public function ouvrirLogin(){
            return view("Authentifications.login");
        }

        public function ouvrirSignup(){
            $genres = $this->getListeGenres();
            $acteurs = $this->getListeActeurs();
            return view("Authentifications.signup", compact("genres", "acteurs"));
        }

        public function getListeGenres(){
            return Genre::orderBy("sexe", "asc")->get();
        }

        public function getListeActeurs(){
            return Acteur::orderBy("nom_acteur", "asc")->get();
        }
    }
?>
