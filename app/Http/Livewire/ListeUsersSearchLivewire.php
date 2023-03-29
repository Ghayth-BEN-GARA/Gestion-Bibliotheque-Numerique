<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;

    class ListeUsersSearchLivewire extends Component{
        public $search_users_navbar;

        public function render(){
            return view('livewire.liste-users-search-livewire', [
    		    'liste_users' => User::where([
                    ['email', '<>', auth()->user()->getEmailUserAttribute()],
                    ['nom', 'like', '%'.$this->search_users_navbar.'%'],
                ])

                ->orWhere([
                    ['email', '<>', auth()->user()->getEmailUserAttribute()],
                    ['prenom', 'like', '%'.$this->search_users_navbar.'%'],
                ])

                ->orderBy('prenom', 'asc')
                ->paginate(10,array('users.*'))
    	    ]);
        }
    }
?>
