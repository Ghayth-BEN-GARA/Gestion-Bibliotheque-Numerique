<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Reservation;
    use App\Models\Livre;

    class ReservationController extends Controller{
        public function ouvrirListeLivresReservations(Request $request){
            return view("Reservations.liste_livres_a_reserver");
        }

        public function ouvrirAddReservation(Request $request){
            $livre = $this->getInformationsLivre($request->input("id_livre"));
            return view("Reservations.add_reservation", compact("livre"));
        }

        public function getInformationsLivre($id_livre){
            return Livre::where("id_livre", "=", $id_livre)->first();
        }

        public function gestionCreerReservation(Request $request){
            if($request->date_retour < $request->date_pret){
                return back()->with("erreur_date_retour", "La date de retour que vous avez saisie n'est pas valide.");
            }

            elseif($this->creerReservation($request->date_pret, $request->date_retour, $request->id_livre, auth()->user()->getIdUserAttribute())){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette réservation a été crée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette réservation pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function creerReservation($date_pret, $date_retour, $id_livre, $id_user){
            $reservation = new Reservation();
            $reservation->setDatePretAttribute($date_pret);
            $reservation->setDateRetourAttribute($date_retour);
            $reservation->setIdLivreAttribute($id_livre);
            $reservation->setIdUserAttribute($id_user);

            return $reservation->save();
        }
    }
?>