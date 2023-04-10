<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\User;
    use App\Models\Reservation;
    use App\Models\Livre;
    use App\Models\Penalite;

    class ListeEtudiantsPenaliserLivewire extends Component{
        public $search_users;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-etudiants-penaliser-livewire', [
                'users' => User::where([
                    ["users.email", "<>", auth()->user()->getEmailUserAttribute()],
                    ["users.nom", "like", "%".$this->search_users."%"],
                    ["users.role", "<>", "Enseignant"],
                    ["reservations.is_returned", "=", false],
                    ["reservations.date_retour", "<", now()->format("Y-m-d")],
                ])

                ->orWhere([
                    ["users.email", "<>", auth()->user()->getEmailUserAttribute()],
                    ["users.prenom", "like", "%".$this->search_users."%"],
                    ["users.role", "<>", "Enseignant"],
                    ["reservations.is_returned", "=", false],
                    ["reservations.date_retour", "<", now()->format("Y-m-d")],
                ])

                ->join("reservations", "reservations.id_user", "=", "users.id_user")
                ->join("livres", "livres.id_livre", "=", "reservations.id_livre")
                ->orderBy("prenom", "asc")
                ->paginate(10, array("users.*", "reservations.*", "livres.*"))
            ]);
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function verifierSipenaliteExiste($id_user){
            return Penalite::where("id_user", "=", $id_user)
            ->exists();
        }
    }
?>
