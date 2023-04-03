<div>
    @if(auth()->user()->getRoleUserAttribute() == "Bibliothécaire")
        <div class = "row mb-2">
            <div class = "col-md-8">
                <a href = "{{url('/add-pfe')}}" class = "btn btn-primary mb-2">
                    <i class = "mdi mdi-plus-circle me-2"></i> 
                    Créer un projet de fin d'étude
                </a>
            </div>
            <div class = "col-md-4">
                <select class = "form-select" id = "annee_universitaire" name = "annee_universitaire" wire:model = "annee_universitaire" required>
                    <option value = "Tout" selected disabled>Sélectionnez l'année universitaire..</option>
                    @if(count($this->getListeAnneesUniversitaires()) == 0)
                            <option value = "#" selected disabled>La liste des années universitaires est vide.</option>
                        @else
                            @foreach($this->getListeAnneesUniversitaires() as $data)
                                <option value = "{{$data->id_annee_universitaire}}">Année universitaire {{$data->debut}} - {{$data->fin}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
        </div>
        <div class = "row mb-2">
            <div class = "col-md-12">
                <div class = "mb-3">
                    <input type = "text" class = "form-control" id = "search_pfe" name = "search_pfe" placeholder = "Chercher un pfe.." wire:model = "search_pfe" required>
                </div>
            </div>
        </div>
    @else
        <div class = "row mb-2">
            <div class = "col-md-4">
                <select class = "form-select" id = "annee_universitaire" name = "annee_universitaire" wire:model = "annee_universitaire" required>
                    <option value = "Tout" selected disabled>Sélectionnez l'année universitaire..</option>
                    @if(count($this->getListeAnneesUniversitaires()) == 0)
                            <option value = "#" selected disabled>La liste des années universitaires est vide.</option>
                        @else
                            @foreach($this->getListeAnneesUniversitaires() as $data)
                                <option value = "{{$data->id_annee_universitaire}}">Année universitaire {{$data->debut}} - {{$data->fin}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
            <div class = "col-md-8">
                <div class = "mb-3">
                    <input type = "text" class = "form-control" id = "search_pfe" name = "search_pfe" placeholder = "Chercher un pfe.." wire:model = "search_pfe" required>
                </div>
            </div>
        </div>
    @endif
    <div class = "row">
        <div class = "col-12">
            <div class = "board">
                <div class = "tasks" data-plugin = "dragula">
                    <h5 class = "mt-0 task-header">Projets de fin d'étude ({{count($pfes)}})</h5>
                    <div id = "task-list-one" class = "row task-list-items p-1">
                        @if(!empty($pfes) && ($pfes->count()))
                            @foreach($pfes as $data)
                                <div class = " col-md-5 card mb-0" style = "margin-left:55px">
                                    <div class = "card-body p-3">
                                        <small class = "float-end text-muted text-capitalize mt-1">
                                            <?php
                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                echo utf8_encode($data->getFormattedDateCreationPdfAttribute())
                                            ?>
                                        </small>
                                        @if($data->debut < date("Y") && $data->fin < date("Y"))
                                            <span class = "badge bg-danger p-2">Année universitaire dépassée</span>
                                        @elseif($data->debut < date("Y") && $data->fin == date("Y"))
                                            <span class = "badge bg-danger p-2">Année universitaire dépassée</span>
                                        @elseif($data->debut == date("Y") && $data->fin > date("Y"))
                                            <span class = "badge bg-success p-2">Année universitaire actuelle</span>
                                        @else
                                            <span class = "badge bg-secondary p-2">Année universitaire à venir</span>
                                        @endif
                                        <h5 class = "mt-2 mb-2">
                                            <a href = "javascript:void(0)" class = "text-body">{{$data->getTitreAttribute()}}</a>
                                        </h5>
                                        <p class = "mb-0">
                                            <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                                <i class = "mdi mdi-calendar-minus text-muted"></i>
                                                {{$data->debut}}
                                            </span>
                                            <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                                <i class = "mdi mdi-calendar-plus text-muted"></i>
                                                {{$data->fin}}
                                            </span>
                                        </p>
                                        <div class = "dropdown float-end">
                                            <a href = "javascript:void(0)" class = "dropdown-toggle text-muted arrow-none" data-bs-toggle = "dropdown" aria-expanded = "false">
                                                <i class = "mdi mdi-dots-vertical font-18"></i>
                                            </a>
                                            <div class = "dropdown-menu dropdown-menu-end">
                                                <a href = "" class = "dropdown-item">
                                                    <i class = "mdi mdi-eye me-1"></i>
                                                    Consulter
                                                </a>
                                                @if(auth()->user()->getRoleUserAttribute() == "Bibliothécaire")
                                                    <a href = "" class = "dropdown-item">
                                                        <i class = "mdi mdi-pencil me-1"></i>
                                                        Modifier
                                                    </a>
                                                    <a href = "javascript:void(0)" class = "dropdown-item" onclick = "questionSupprimerPfe({{$data->getIdPfeAttribute()}})">
                                                        <i class = "mdi mdi-delete me-1"></i>
                                                        Supprimer
                                                    </a>
                                                    <a href = "" class = "dropdown-item">
                                                        <i class = "mdi mdi-download me-1"></i>
                                                        Télécharger
                                                    </a>
                                                @elseif(auth()->user()->getRoleUserAttribute() == "Enseignant")
                                                    <a href = "" class = "dropdown-item">
                                                        <i class = "mdi mdi-download me-1"></i>
                                                        Télécharger
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <p class = "mb-0">
                                            <img src = "{{URL::asset('/images/pdf.png')}}" alt = "Image de pdf" class = "avatar-xs rounded-circle me-1">
                                            <span class = "align-middle">Fichier PDF</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class = "text-center h5 mt-4">Aucun pfe actuellement trouvé.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "mt-3 mb-3">
        {{$pfes->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
