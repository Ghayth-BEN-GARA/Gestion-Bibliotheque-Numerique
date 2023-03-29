<div>
    <div class = "app-search dropdown d-none d-lg-block">
        <form method = "get">
            <div class = "input-group">
                <input type = "text" class = "form-control dropdown-toggle" placeholder = "Chercher des utilisateurs.." id = "top-search" required wire:model = "search_users_navbar">
                <span class = "mdi mdi-magnify search-icon"></span>
                <button class = "input-group-text btn-primary" type = "submit">Chercher</button>
            </div>
        </form>
        @if(strlen($search_users_navbar) > 0)
            <div class = "dropdown-menu dropdown-menu-animated dropdown-lg d-block" id = "search-dropdown">
                <div class = "dropdown-header noti-title">
                    <h5 class = "text-overflow mb-2">
                        <span class = "text-danger">{{count($liste_users)}}</span> 
                        @if(count($liste_users) > 1)
                            utilisateurs trouvés
                        @else
                            utilisateur trouvé
                        @endif
                    </h5>
                </div>
                <a href = "{{url('/dashboard')}}" class = "dropdown-item notify-item">
                    <i class = "uil-notes font-16 me-1"></i>
                    <span>Dashboard</span>
                </a>
                <a href = "javascript:void(0);" class = "dropdown-item notify-item">
                    <i class = "uil-life-ring font-16 me-1"></i>
                    <span>Aide</span>
                </a>
                <a href = "javascript:void(0);" class = "dropdown-item notify-item">
                    <i class = "uil-user font-16 me-1"></i>
                    <span>Profil</span>
                </a>
                <div class = "dropdown-header noti-title">
                    <h6 class = "text-overflow mb-2 text-uppercase">Utilisateurs</h6>
                </div>
                <div class = "notification-list">
                    @if(!empty($liste_users) && ($liste_users->count()))
                        @foreach($liste_users as $data)
                            <a href = "javascript:void(0);" class = "dropdown-item notify-item">
                                <div class = "d-flex">
                                    <img class = "d-flex me-2 rounded-circle" src = "{{URL::asset($data->getImageUserAttribute())}}" alt = "Photo de profil" height="32">
                                    <div class = "w-100">
                                        <h5 class = "m-0 font-14">{{$data->getFullnameUserAttribute()}}</h5>
                                        <span class = "font-12 mb-0">{{$data->getRoleUserAttribute()}}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class = "text-center mx-auto">Aucun utilisateur actuellement trouvé.</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
