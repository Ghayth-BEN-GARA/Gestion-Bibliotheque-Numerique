<div>
    <div class = "row mb-2">
        <div class = "col-md-8">
            <a href = "{{url('/add-livre')}}" class = "btn btn-primary mb-2">
                <i class = "mdi mdi-plus-circle me-2"></i> 
                Créer des livres
            </a>
        </div>
        <div class = "col-md-4">
            <div class = "mb-3">
                <input type = "text" class = "form-control" id = "search_livres" name = "search_livres" placeholder = "Chercher un livre.." wire:model = "search_livres" required>
            </div>
        </div>
    </div>
    <div class = "row">
        @if(!empty($livres) && ($livres->count()))
            @foreach($livres as $data)
                <div class = "col-md-6 col-lg-3">
                    <div class = "card d-block">
                        <img class = "card-img-top" src = "{{URL::asset($data->getImageLivreAttribute())}}" alt = "Image de livre" height = "300">
                        <div class = "card-body">
                            <h5 class = "card-title">{{$data->getTitreLivreAttribute()}}</h5>
                            <p class = "card-text">{{$data->getAuteurLivreAttribute()}}</p>
                        </div>
                        <div class = "card-body">
                            <a href = "#" class = "card-link text-custom" style = "color:#000">
                                Modifier
                            </a>
                            <a href = "#" class = "card-link text-custom" style = "color:#000">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class = "mt-3 text-center">Aucun livre actuellement trouvé.</p>
        @endif
    </div>
    <div class = "mt-3 mb-3">
        {{$livres->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
