<div>
    <div class = "row mb-2">
        <div class = "col-md-12">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_reservations" name = "search_reservations" placeholder = "Chercher une réservation.." wire:model = "search_reservations" required>
            </div>
        </div>
    </div>
    <div class = "row">
        @if(!empty($reservations) && ($reservations->count()))
            @foreach($reservations as $data)
                <div class = "col-md-6 col-xxl-3">
                    <div class = "card d-block">
                        <div class = "card-body">
                            <div class = "dropdown card-widgets">
                                <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none" data-bs-toggle = "dropdown" aria-expanded = "false">
                                    <i class = "dripicons-dots-3"></i>
                                </a>
                                <div class = "dropdown-menu dropdown-menu-end">
                                    <a href = "{{url('/reservation-bibliothecaire?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                        <i class = "mdi mdi-eye me-1"></i>
                                        Consulter
                                    </a>
                                    @if(now()->addDay(1)->format("Y-m-d") == $data->getDateRetourAttribute())
                                        <a href = "{{url('/envoyer-alert-reservation?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                            <i class = "mdi mdi-email-send me-1"></i>
                                            Notifier
                                        </a>
                                    @endif
                                    <a href = "{{url('/emprunt?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                        <i class = "mdi mdi-file-chart-outline me-1"></i>
                                        Consulter l'emprunt
                                    </a>
                                    @if($data->getIsReturnedAttribute() == false)
                                        <a href = "{{url('/edit-livre-is-returned?id_reservation='.$data->getIdReservationAttribute())}}" class = "dropdown-item">
                                            <i class = "mdi mdi-book-edit-outline me-1"></i>
                                            Modifier le retour
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <h4 class = "mt-0">
                                <a href = "javascript:void(0)" class = "text-title">{{$data->titre_livre}}</a>
                            </h4>
                            @if($data->getIsReturnedAttribute() == true)
                                <div class = "badge bg-success mb-3 p-2">Retourné</div>
                            @else
                                <div class = "badge bg-danger mb-3 p-2">Non retourné</div>
                            @endif
                            <p class = "text-muted font-13 mb-3">{{$data->description_livre}}</p>
                            <p class = "mb-1">
                                <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class= "mdi mdi-account-circle text-muted"></i>
                                    <b>Auteur : </b> {{$data->auteur_livre}}
                                </span>
                                <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class= "mdi mdi-home text-muted"></i>
                                    <b>Maison : </b> {{$data->maison_edition_livre}}
                                </span>
                                <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class= "mdi mdi-calendar text-muted"></i>
                                    <b>Année : </b> {{$data->annee_edition_livre}}
                                </span>
                            </p>
                            <div id = "tooltip-container">
                                <a href = "javascript:void(0)" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$data->prenom}} {{$data->nom}}" class = "d-inline-block">
                                    <img src = "{{URL::asset($data->image)}}" class = "rounded-circle avatar-xs" alt = "Photo de profil">
                                </a>
                                <a href = "javascript:void(0)" class = "d-inline-block text-muted fw-bold ms-2">
                                    {{$data->prenom}} {{$data->nom}}
                                </a>
                            </div>
                            @if(now()->addDay(1)->format("Y-m-d") == $data->getDateRetourAttribute())
                                <p class = "mt-3">
                                    <strong class = "text-danger">Besoin de le notifier pour la date de retour du livre.</strong>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class = "mt-3 text-center">Aucune réservation actuellement trouvée.</p>
        @endif
    </div>
    <div class = "mt-3 mb-3">
        {{$reservations->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
