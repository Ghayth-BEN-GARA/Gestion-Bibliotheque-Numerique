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
        </ul>
    </div>
</div>