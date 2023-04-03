<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class PfeController extends Controller{
        public function ouvrirListePfes(){
            return view("Pfes.liste_pfes");
        }
    }
?>
