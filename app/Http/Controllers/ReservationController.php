<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\EnvoyerAlertNotificationDateRetour;
    use App\Mail\EnvoyerMailLivreRetourner;
    use App\Models\Reservation;
    use App\Models\Livre;
    use App\Models\User;
    use App\Models\Penalite;

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

        public function ouvrirMesReservation(){
            $mes_reservations = $this->getListeMesReservations(auth()->user()->getIdUserAttribute());
            return view("Reservations.mes_reservations", compact("mes_reservations"));
        }

        public function getListeMesReservations($id_user){
            return Reservation::join("livres", "livres.id_livre", "=", "reservations.id_livre")
            ->where("reservations.id_user", "=", $id_user)
            ->orderBy("date_time_creation_reservation", "desc")
            ->paginate(10);
        }

        public function gestionAnnulerReservation(Request $request){
            if($this->annulerReservation($request->input("id_reservation"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette réservation a été annulée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas annuler cette réservation pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function annulerReservation($id_reservation){
            return Reservation::where("id_reservation", "=", $id_reservation)->delete();
        }

        public function ouvrirEditReservation(Request $request){
            $reservation = $this->getInformationsReservationUser($request->input("id_reservation"), auth()->user()->getIdUserAttribute());
            return view("reservations.edit_reservation", compact("reservation"));
        }

        public function getInformationsReservationUser($id_reservation, $id_user){
            return Reservation::join("livres", "livres.id_livre", "=", "reservations.id_livre")
            ->where("reservations.id_user", "=", $id_user)
            ->where("reservations.id_reservation", "=", $id_reservation)
            ->orderBy("date_time_creation_reservation", "desc")
            ->first();
        }

        public function gestionModifierReservation(Request $request){
            if($request->date_retour < $request->date_pret){
                return back()->with("erreur_date_retour", "La date de retour que vous avez saisie n'est pas valide.");
            }

            elseif($this->modifierReservation($request->date_pret, $request->date_retour, $request->id_reservation)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette réservation a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette réservation pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierReservation($date_pret, $date_retour, $id_reservation){
            return Reservation::where("id_reservation", "=", $id_reservation)->update([
                "date_pret" => $date_pret,
                "date_retour" => $date_retour
            ]);
        }

        public function ouvrirReservation(Request $request){
            $reservation = $this->getInformationsReservationUser($request->input("id_reservation"), auth()->user()->getIdUserAttribute());
            return view("reservations.reservation", compact("reservation"));
        }

        public function ouvrirListeReservations(){
            return view("reservations.liste_reservations");
        }

        public function ouvrirReservationBibliothecaire(Request $request){
            $reservation = $this->getInformationsReservation($request->input("id_reservation"));
            return view("reservations.reservation_bibliothecaire", compact("reservation"));
        }

        public function getInformationsReservation($id_reservation){
            return Reservation::join("livres", "livres.id_livre", "=", "reservations.id_livre")
            ->join("users", "users.id_user", "=", "reservations.id_user")
            ->where("reservations.id_reservation", "=", $id_reservation)
            ->orderBy("date_time_creation_reservation", "desc")
            ->first();
        }

        public function gestionEnvoyerAlerteReservation(Request $request){
            $reservation = $this->getInformationsReservation($request->input("id_reservation"));

            if($this->envoyerAlertReservation($reservation->email, $reservation->nom, $reservation->prenom, $reservation->titre_livre, $reservation->date_pret)){
                return back()->with("success", "Nous sommes très heureux de vous informer que vous avez envoyé une notification à l'utilisateur avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer une notification à l'utilisateur pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function envoyerAlertReservation($email, $nom, $prenom, $titre, $date_pret){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'titre' => $titre,
                "date_pret" => $date_pret
            ];
    
            return Mail::to($email)->send(new EnvoyerAlertNotificationDateRetour($mailData));
        }

        public function gestionEnvoyerMailLivreRetourner(Request $request){
            $reservation = $this->getInformationsReservation($request->input("id_reservation"));

            if($this->envoyerMailLivreRetourner($reservation->nom, $reservation->prenom, $reservation->email, $reservation->date_pret, $reservation->titre_livre, $reservation->auteur_livre)){
                $this->modifierLivreIsReturned($request->input("id_reservation"));
                return back()->with("success", "Nous sommes très heureux de vous informer que vous avez envoyé une notification à l'utilisateur avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer une notification à la bibliothéque pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function envoyerMailLivreRetourner($nom, $prenom, $email, $date_pret, $titre, $auteur){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'titre' => $titre,
                "date_pret" => $date_pret,
                "auteur" => $auteur
            ];

            return Mail::to("biblionumer@gmail.com")->send(new EnvoyerMailLivreRetourner($mailData));
        }

        public function modifierLivreIsReturned($id_reservation){
            return Reservation::where("id_reservation", "=", $id_reservation)->update([
                "is_returned" => true
            ]);
        }

        public function ouvrirPensaliserEtudiant(Request $request){
            $user = $this->getInformationsUser($request->input("id_user"));
            return view("Reservations.penaliser_etudiant", compact("user"));
        }

        public function getInformationsUser($id_user){
            return User::where("id_user", "=", $id_user)
            ->where("role", "=", "Étudiant")
            ->first();
        }

        public function gestionCreerPenalisationEtudiant(Request $request){
            if($this->verifierSiPenaliteExist($request->id_user)){
                if($this->modifierPenaliteEtudiant($request->id_user, $request->nbr_jours, $request->id_reservation)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que vous avez pénalisé l'étudiant avec succès.");
                }
    
                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas pénaliser l'étudiant pour le moment. Veuillez réessayer plus tard.");
                }
            }

            else{
                if($this->creerPenaliteEtudiant($request->id_user, $request->nbr_jours, $request->id_reservation)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que vous avez pénalisé l'étudiant avec succès.");
                }
    
                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas pénaliser l'étudiant pour le moment. Veuillez réessayer plus tard.");
                }
            }
        }

        public function creerPenaliteEtudiant($id_user, $nbr_jours, $id_reservation){
            $penalite = new Penalite();
            $penalite->setIdUserAttribute($id_user);
            $penalite->setNbrJourAttribute($nbr_jours);
            $penalite->setIdReservationAttribute($id_reservation);

            return $penalite->save();
        }

        public function modifierPenaliteEtudiant($id_user, $nbr_jours, $id_reservation){
            return Penalite::where("id_user", "=", $id_user)->update([
                "nbr_jour" => $nbr_jours,
                "id_reservation" => $id_reservation
            ]);
        }

        public function verifierSiPenaliteExist($id_user){
            return Penalite::where("id_user", "=", $id_user)->exists();
        }
    }
?>