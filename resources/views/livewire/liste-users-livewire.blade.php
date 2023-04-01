<div>
    <div class = "row mb-2">
        <div class = "col-md-8">
            <a href = "{{url('/add-user')}}" class = "btn btn-primary mb-2">
                <i class = "mdi mdi-plus-circle me-2"></i> 
                Créer des utilisateurs
            </a>
        </div>
        <div class = "col-md-4">
            <select class = "form-select" id = "role_user" name = "role_user" wire:model = "role_user" required>
                <option value = "Tout" selected disabled>Sélectionnez le rôle..</option>
                @if(count($this->getListeActeurs()) == 0)
                        <option value = "#" selected disabled>La liste des acteurs est vide.</option>
                    @else
                        @foreach($this->getListeActeurs() as $data)
                            <option value = "{{$data->getNomActeurAttribute()}}">{{$data->getNomActeurAttribute()}}</option>
                        @endforeach
                    @endif
            </select>
        </div>
    </div>
    <div class = "row mb-2">
        <div class = "col-md-12">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_users" name = "search_users" placeholder = "Chercher un utilisateur.." wire:model = "search_users" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>Utilisateur</th>
                    <th>Adresse email</th>
                    <th>Numéro</th>
                    <th>Rôle</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users) && ($users->count()))
                    @foreach($users as $data)
                        <tr>
                            <td class = "table-user">
                                <img src = "{{URL::asset($data->getImageUserAttribute())}}" alt = "Photo de profil" class = "me-2 rounded-circle">
                                <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$data->getFullNameUserAttribute()}}</a>
                            </td>
                            <td>{{$data->getEmailUserAttribute()}}</td>
                            <td>{{$data->getFormattedMobileUserAttribute()}}</td>
                            <td>{{$data->getRoleUserAttribute()}}</td>
                            <td>
                                @if($data->getStatusUserAttribute() == true)
                                    <span class = "badge bg-success rounded-pill p-2">Activé</span>
                                @else
                                    <span class = "badge bg-danger rounded-pill p-2">Désactivé</span>
                                @endif
                            </td>
                            <td>
                                <a href = "{{url('/user?id_user='.$data->getIdUserAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "{{url('/edit-user?id_user='.$data->getIdUserAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerUtilisateur({{$data->getIdUserAttribute()}})">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "6" class = "text-center">Aucun utilisateur actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$users->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
