<div class = "navbar-custom">
    <ul class = "list-unstyled topbar-menu float-end mb-0">
        <li class = "dropdown notification-list d-lg-none">
            <a class = "nav-link dropdown-toggle arrow-none" data-bs-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <i class = "dripicons-search noti-icon"></i>
            </a>
            <div class = "dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class = "p-3" method = "get">
                    <input type = "text" class = "form-control" placeholder = "Chercher des utilisateurs.." aria-label = "Recipient's username" required>
                </form>
            </div>
        </li>
        <li class = "dropdown notification-list d-none d-sm-inline-block">
            <a class = "nav-link dropdown-toggle arrow-none" data-bs-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <i class = "dripicons-view-apps noti-icon"></i>
            </a>
            <div class = "dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">
                <div class = "p-2">
                    <div class = "row g-0">
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://ipsas-ens.net/" target = "_blank">
                                <img src = "{{URL::asset('/images/facebook.png')}}" alt = "Facebook">
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.youtube.com/channel/UCDgtZSQNwqCSC5UU3-mIqxg" target = "_blank">
                                <img src = "{{URL::asset('/images/youtube.png')}}" alt = "Youtube">
                                <span>Youtube</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.linkedin.com/company/institut-polytechnique-des-sciences-avanc%C3%A9es-de-sfax/" target = "_blank">
                                <img src = "{{URL::asset('/images/linkedin.png')}}" alt = "Linkedin">
                                <span>Linkedin</span>
                            </a>
                        </div>
                    </div>
                    <div class = "row g-0">
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.instagram.com/ipsas_sfax/" target = "_blank">
                                <img src = "{{URL::asset('/images/instagram.png')}}" alt = "Instagram">
                                <span>Instagram</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://ipsas-ens.net/" target = "_blank">
                                <img src = "{{URL::asset('/images/website.png')}}" alt = "Site web">
                                <span>Site web</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "mailto:contact@ipsas.ens.net" target = "_blank">
                                <img src = "{{URL::asset('/images/google.png')}}" alt = "Gmail">
                                <span>Gmail</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class = "notification-list">
            <a class = "nav-link end-bar-toggle" href = "javascript: void(0);">
                <i class = "dripicons-gear noti-icon"></i>
            </a>
        </li>
        <li class = "dropdown notification-list">
            <a class = "nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle = "dropdown" href = "javascript:void(0)" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <span class = "account-user-avatar"> 
                    <img src = "{{URL::asset(auth()->user()->getImageUserAttribute())}}" alt = "Photo de profil" class = "rounded-circle">
                </span>
                <span>
                    <span class = "account-user-name">{{auth()->user()->getFullnameUserAttribute()}}</span>
                    <span class = "account-position">{{auth()->user()->getRoleUserAttribute()}}</span>
                </span>
            </a>
            <div class = "dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <div class = " dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Bienvenu !</h6>
                </div>
                <a href = "#" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-account-circle me-1"></i>
                    <span>Profil</span>
                </a>
                <a href = "#" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-format-list-bulleted me-1"></i>
                    <span>Journal d'authentification</span>
                </a>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-cog me-1"></i>
                    <span>Paramétres</span>
                </a>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy me-1"></i>
                    <span>Aide</span>
                </a>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item" onclick = "questionDeconnexion()">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </li>
    </ul>
    <button class = "button-menu-mobile open-left">
        <i class = "mdi mdi-menu"></i>
    </button>
</div>