<div>
    <div class = "row mb-2">
        <div class = "col-md-8">
            <a href = "{{url('/add-annee-universitaire')}}" class = "btn btn-primary mb-2">
                <i class = "mdi mdi-plus-circle me-2"></i> 
                Créer des années universitaire
            </a>
        </div>
        <div class = "col-md-4">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_annees_universitaire" name = "search_annees_universitaire" placeholder = "Chercher une anée universitaire.." wire:model = "search_annees_universitaire" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Année de début</th>
                    <th>Année de la fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($annees_universitaire) && ($annees_universitaire->count()))
                    <?php $i = 1;?>
                    @foreach($annees_universitaire as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                {{$data->getDebutAttribute()}}
                            </td>
                            <td>
                                {{$data->getFinAttribute()}}
                            </td>
                            <td>
                                <a href = "{{url('/annee-universitaire?id_annee_universitaire='.$data->getIdAnneeUniversitaireAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "{{url('/edit-annee-universitaire?id_annee_universitaire='.$data->getIdAnneeUniversitaireAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerAnneeUniversitaire({{$data->getIdAnneeUniversitaireAttribute()}})">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "4" class = "text-center">Aucune année universitaire actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$annees_universitaire->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
