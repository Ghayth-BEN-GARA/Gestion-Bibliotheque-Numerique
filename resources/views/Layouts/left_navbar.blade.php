<div class = "leftside-menu">
    <a href = "{{url('/dashboard')}}" class = "logo text-center logo-light">
        <span class = "logo-lg">
            <img src = "{{URL::asset('/images/favicon.png')}}" alt = "" height = "70">
        </span>
        <span class = "logo-sm">
                <img src = "{{asset('/images/favicon.png')}}" alt = "" height = "20">
        </span>
    </a>
    <a href = "{{url('/dashboard')}}" class = "logo text-center logo-dark">
        <span class = "logo-lg">
            <img src = "{{URL::asset('/images/favicon.png')}}" alt = "" height = "70">
        </span>
        <span class = "logo-sm">
            <img src = "{{URL::asset('/images/favicon.png')}}" alt = "" height = "20">
        </span>
    </a>
    <div class = "h-100" id = "leftside-menu-container" data-simplebar = "">
        <ul class = "side-nav">
            <li class = "side-nav-title side-nav-item">Navigation</li>
            <li class = "side-nav-item">
                <a href = "{{url('/dashboard')}}" class = "side-nav-link">
                    <i class = "uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class = "side-nav-item">
                <a href = "{{url('/profil')}}" class = "side-nav-link">
                    <i class = "uil-user"></i>
                    <span> Profil </span>
                </a>
            </li>
            @if(auth()->user()->getRoleUserAttribute() == "Bibliothécaire")
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#users" aria-expanded = "false" aria-controls = "users" class = "side-nav-link">
                        <i class = "uil-users-alt"></i>
                        <span> Utilisateurs </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "users">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-users')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>