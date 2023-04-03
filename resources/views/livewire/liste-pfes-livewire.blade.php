<div>
    <div class = "row mb-2">
        @if(auth()->user()->getRoleUserAttribute() == "Bibliothécaire")
            <div class = "col-md-8">
                <a href = "{{url('/add-pfe')}}" class = "btn btn-primary mb-2">
                    <i class = "mdi mdi-plus-circle me-2"></i> 
                    Créer un projet de fin d'étude
                </a>
            </div>
        @endif
    </div>
</div>
