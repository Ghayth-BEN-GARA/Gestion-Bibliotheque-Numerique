<div>
    <div class = "row mb-2">
        <div class = "col-md-12">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_users" name = "search_users" placeholder = "Chercher un étudiant.." wire:model = "search_users" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>Étudiant</th>
                    <th>Numéro</th>
                    <th>Réservation</th>
                    <th>Livre</th>
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
                            <td>{{$data->getFormattedMobileUserAttribute()}}</td>
                            <td>
                                Identifiant: {{$data->id_reservation}}
                                <br><br>
                                Livre: {{$data->titre_livre}}
                                <br><br>
                                Réservé pour:
                                <br>
                                <?php
                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                    echo utf8_encode( strftime("%A %d %B %Y",strtotime(strftime($data->date_pret))))
                                ?>
                                <br><br>
                                Retour pour:
                                <br>
                                <?php
                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                    echo utf8_encode( strftime("%A %d %B %Y",strtotime(strftime($data->date_retour))))
                                ?>
                            </td>
                            <td>
                                <span class = "badge bg-danger rounded-pill p-2">Non retourné</span>
                            </td>
                            <td>
                                @if(!$this->verifierSipenaliteExiste($data->getIdUserAttribute()))
                                    <a href = "{{url('/penaliser-etudiant?id_user='.$data->getIdUserAttribute())}}" class = "btn btn-danger">Pénaliser</a>
                                @else
                                    <a href = "{{url('/depenaliser-etudiant?id_user='.$data->getIdUserAttribute())}}" class = "btn btn-success">Dépénaliser</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "4" class = "text-center">Aucun étudiant actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$users->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
