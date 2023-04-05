<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class ReservationController extends Controller{
        public function ouvrirListeLivresReservations(Request $request){
            return view("Reservations.liste_livres_a_reserver");
        }
    }
?>