<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class AuthentificationController extends Controller{
        public function ouvrirLogin(){
            return view("Authentifications.login");
        }
    }
?>