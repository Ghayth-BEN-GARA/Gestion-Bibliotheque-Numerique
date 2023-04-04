<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class LivreController extends Controller{
        public function ouvrirListeLivres(){
            return view("Livres.liste_livres");
        }

        public function ouvrirAddLivre(){
            return view("Livres.add_livre");
        }
    }
?>
