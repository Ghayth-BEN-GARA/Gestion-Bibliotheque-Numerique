<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\AnneeUniversitaire;
    use App\Models\Pfe;

    class ListePfesLivewire extends Component{
        public $annee_universitaire = "Tout";
        public $search_pfe;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            if($this->annee_universitaire == "Tout"){
                return view('livewire.liste-pfes-livewire', [
                    'pfes' => Pfe::where([
                        ["pfes.titre", "like", "%".$this->search_pfe."%"],
                    ])

                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "pfes.id_annee_universitaire")
                    ->orderBy("pfes.date_creation_pdf", "asc")
                    ->paginate(10, array("pfes.*", "annees_universitaires.*"))
                ]);
            }

            else{
                return view('livewire.liste-pfes-livewire', [
                    "pfes" => Pfe::where([
                        ["pfes.titre", "like", "%".$this->search_pfe."%"],
                        ["annees_universitaires.id_annee_universitaire", "like", "%".$this->annee_universitaire."%"],
                    ])

                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "pfes.id_annee_universitaire")
                    ->orderBy("pfes.date_creation_pdf", "asc")
                    ->paginate(10, array("pfes.*", "annees_universitaires.*"))
                ]);
            }
        }

        public function getListeAnneesUniversitaires(){
            return AnneeUniversitaire::orderBy("debut", "asc")->get();
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }
    }
?>
