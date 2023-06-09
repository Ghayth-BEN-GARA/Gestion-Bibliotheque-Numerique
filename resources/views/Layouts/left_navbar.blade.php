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
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#annees_universitaires" aria-expanded = "false" aria-controls = "annees_universitaires" class = "side-nav-link">
                        <i class = "uil-calendar-alt"></i>
                        <span> Années Universitaire </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "annees_universitaires">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-annees-universitaire')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#livres" aria-expanded = "false" aria-controls = "livres" class = "side-nav-link">
                        <i class = "uil-book-alt"></i>
                        <span> Livres </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "livres">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-livres')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#reservations" aria-expanded = "false" aria-controls = "reservations" class = "side-nav-link">
                        <i class = "uil-book-open"></i>
                        <span> Réservations </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "reservations">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-reservations')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#penalites" aria-expanded = "false" aria-controls = "penalites" class = "side-nav-link">
                        <i class = "mdi mdi-account-alert-outline"></i>
                        <span> Pénalités  </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "penalites">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-users-penaliser')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
            @endif
            <li class = "side-nav-item">
                <a data-bs-toggle = "collapse" href = "#pfes" aria-expanded = "false" aria-controls = "pfes" class = "side-nav-link">
                    <i class = "uil-graduation-hat"></i>
                    <span> PFE </span>
                    <span class = "menu-arrow"></span>
                </a>
                <div class = "collapse" id = "pfes">
                    <ul class = "side-nav-second-level">
                        <li>
                            <a href = "{{url('/liste-pfes')}}">Gérer</a>
                        </li>       
                    </ul>
                </div>
            </li>
            @if(auth()->user()->getRoleUserAttribute() == "Étudiant" || auth()->user()->getRoleUserAttribute() == "Enseignant")
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#livres" aria-expanded = "false" aria-controls = "livres" class = "side-nav-link">
                        <i class = "uil-book-alt"></i>
                        <span> Livres </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "livres">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-livres-reservations')}}">Consulter</a>
                            </li>       
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#reservations" aria-expanded = "false" aria-controls = "reservations" class = "side-nav-link">
                        <i class = "uil-book-open"></i>
                        <span> Mes réservations </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "reservations">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/mes-reservations')}}">Gérer</a>
                            </li>       
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>