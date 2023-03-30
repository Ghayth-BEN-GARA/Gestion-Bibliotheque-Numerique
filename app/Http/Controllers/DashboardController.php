<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\EnvoyerMailContact;
    use App\Models\TypeMode;

    class DashboardController extends Controller{
        public function ouvrirDashboard(){
            return view("home");
        }

        public static function getTypeModeCompteUser(){
            return TypeMode::where("id_user", "=", auth()->user()->getIdUserAttribute())->first();
        }

        public function ouvrir404(){
            return view("Errors.404");
        }

        public function modifierTypeMode(Request $request){
            return TypeMode::where("id_user", "=", auth()->user()->getIdUserAttribute())->update([
                "type_mode" => $request->mode
            ]);
        }

        public function ouvrirAide(){
            return view("Autres.help");
        }

        public function ouvrirContact(){
            return view("Autres.contact");
        }

        public function gestionEnvoyerMailContact(Request $request){
            if($this->sendMailContact($request->nom, $request->prenom, $request->email, $request->sujet, $request->message)){
                return back()->with("success", "Nous sommes très heureux de vous informer que votre mail a été envoyé à l'administration avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer ce mail à l'administration. Veuillez réessayer plus tard.");
            }
        }

        public function sendMailContact($nom, $prenom, $email, $objet, $message){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'objet' => $objet,
                'message' => $message
                
            ];
    
            return Mail::to("biblio@gmail.com")->send(new EnvoyerMailContact($mailData));
        }
    }
?>
