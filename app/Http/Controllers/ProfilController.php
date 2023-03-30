<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Session;

    class ProfilController extends Controller{
        public function modifierStatusUser(Request $request){
            return User::where("id_user", "=", auth()->user()->getIdUserAttribute())->update([
                "status" => $request->status
            ]);
        }

        public function gestionSupprimerCompte(){
            if($this->supprimerCompte(auth()->user()->getIdUserAttribute())){
                if($this->logoutUser()){
                    return redirect("/")->with("deleted", "Votre compte a été supprimé avec succès aujourd'hui. Si vous pensez qu'il a été supprimé par erreur, veuillez contacter l'administration.");
                }

                else{
                    return redirect("/404"); 
                }
            }

            else{
                return redirect("/404"); 
            }
        }

        public function supprimerCompte($id_user){
            return User::where("id_user", "=", $id_user)->delete();
        }

        public function logoutUser(){
            Session::forget('email');
            Session::flush();
            auth()->logout();

            if (!Session::has('email')){
                return true;
            }

            else{
                return false;
            }
        }
    }
?>
