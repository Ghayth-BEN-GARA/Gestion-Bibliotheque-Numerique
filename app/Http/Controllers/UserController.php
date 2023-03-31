<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;

    class UserController extends Controller{
        public function ouvrirListeUsers(){
            return view("Users.liste_users");
        }

        public function ouvrirAddUser(){
            return view("Users.add_user");
        }

        public function gestionCreerEtudiant(Request $request){
            # code...
        }
    }
?>
