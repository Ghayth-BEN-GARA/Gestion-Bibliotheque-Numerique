<div>
    <div class = "row mb-2">
        <div class = "col-md-12">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_livres" name = "search_livres" placeholder = "Chercher un livre.." wire:model = "search_livres" required>
            </div>
        </div>
        <div class = "row">
            <div class = "col-12">
                <div class = "card-group">
                    @if(!empty($livres) && ($livres->count()))
                        @foreach($livres as $data)
                            <div class = "card d-block mx-2">
                                <img class = "card-img-top mt-2" src = "{{URL::asset($data->getImageLivreAttribute())}}" alt = "Image de livre">
                                <div class = "card-body">
                                    <h5 class = "card-title">Titre : {{$data->getTitreLivreAttribute()}}</h5>
                                    <h6 class = "card-subtitle text-muted">Auteur : {{$data->getAuteurLivreAttribute()}}</h6>
                                </div>
                                <div class = "card-body">
                                    <p class = "card-text">{{$data->getDescriptionLivreAttribute()}}</p>
                                </div>
                                <p class = "card-footer">
                                    @if($this->getInformationsReservationLivre($data->getIdLivreAttribute()) == 1)
                                        <a href = "javascript:void(0)" class = "btn btn-light" disabled style = "cursor:default">Réservé</a>
                                    @elseif($this->verifierSiPenaliteExist())
                                        <a href = "javascript:void(0)" class = "btn btn-danger">Pénalisé</a>
                                    @else
                                        <a href = "{{url('/add-reservation?id_livre='.$data->getIdLivreAttribute())}}" class = "btn btn-primary">Réserver</a>
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p class = "mt-3 text-center mx-auto">Aucun livre actuellement trouvé.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class = "mt-3 mb-3">
        {{$livres->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
