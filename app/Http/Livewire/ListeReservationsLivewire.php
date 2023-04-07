<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Reservation;
    use App\Models\Livre;
    use App\Models\Penalite;

    class ListeReservationsLivewire extends Component{
        public $search_reservations;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-reservations-livewire', [
                'reservations' => Reservation::where([
                    ["livres.titre_livre", "like", "%".$this->search_reservations."%"],
                ])

                ->orWhere([
                    ["users.prenom", "like", "%".$this->search_reservations."%"],
                ])

                ->orWhere([
                    ["users.nom", "like", "%".$this->search_reservations."%"],
                ])

                ->join("livres", "livres.id_livre", "=", "reservations.id_livre")
                ->join("users", "users.id_user", "=", "reservations.id_user")
                ->orderBy("livres.titre_livre", "asc")
                ->paginate(10, array("reservations.*", "livres.*", "users.*"))
            ]);
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getPenaliteUserReservation($id_user, $id_reservation){
            return Penalite::where("id_user", "=", $id_user)
            ->where("id_reservation", "=", $id_reservation)
            ->exists();
        }
    }
?>
