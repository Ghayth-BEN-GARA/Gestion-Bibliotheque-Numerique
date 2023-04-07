<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Livre;
    use App\Models\Reservation;
    use App\Models\Penalite;

    class ListeLivresReservationsLivewire extends Component{
        public $search_livres;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-livres-reservations-livewire', [
                'livres' => Livre::where([
                    ["code_livre", "like", "%".$this->search_livres."%"],
                ])

                ->orWhere([
                    ["titre_livre", "like", "%".$this->search_livres."%"],
                ])

                ->orderBy("titre_livre", "asc")
                    ->paginate(10, array("livres.*"))
                ]);
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getInformationsReservationLivre($id_livre){
            return Reservation::where("id_livre", "=", $id_livre)
            ->where("id_user", "=", auth()->user()->getIdUserAttribute())
            ->where("is_returned", "=", false)
            ->count();
        }

        public function verifierSiLivreNonRetourneExist(){
            return Reservation::where("id_user", "=", auth()->user()->getIdUserAttribute())
            ->where("is_returned", "=", false)
            ->exists();
        }

        public function verifierSiPenaliteExist(){
            return Penalite::where("id_user", "=", auth()->user()->getIdUserAttribute())
            ->where("date_start", "=", now()->addDay(-1)->format("Y-m-d"))
            ->exists();
        }
    }
?>
