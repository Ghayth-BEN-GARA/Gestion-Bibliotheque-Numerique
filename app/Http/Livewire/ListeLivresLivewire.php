<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Livre;

    class ListeLivresLivewire extends Component{
        public $search_livres;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-livres-livewire', [
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
    }
?>
