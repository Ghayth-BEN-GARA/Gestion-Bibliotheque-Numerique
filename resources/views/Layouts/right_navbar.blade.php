<div class = "end-bar">
    <div class = "rightbar-title">
        <a href = "javascript:void(0)" class = "end-bar-toggle float-end">
            <i class = "dripicons-cross noti-icon"></i>
        </a>
        <h5 class = "m-0">Paramètres</h5>
    </div>
    <div class = "rightbar-content h-100" data-simplebar = "">
        <div class = "p-3">
            <div class = "alert alert-warning" role = "alert">
                <strong>Personnaliser </strong> les paramètres de votre compte selon vos choix. 
            </div>
            <h5 class = "mt-3">Mode</h5>
            <hr class = "mt-1">
            @if(App\Http\Controllers\DashboardController::getTypeModeCompteUser()->getTypeModeAttribute() == "Light")
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "dark" id = "dark-mode-check" onclick = "modifierTypeMode()">
                    <label class = "form-check-label" for = "dark-mode-check">Sombre</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "light" id = "light-mode-check" onclick = "modifierTypeMode()" checked>
                    <label class = "form-check-label" for = "light-mode-check">Normal</label>
                </div>
            @else
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "dark" id = "dark-mode-check" onclick = "modifierTypeMode()" checked>
                    <label class = "form-check-label" for = "dark-mode-check">Sombre</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "light" id = "light-mode-check" onclick = "modifierTypeMode()">
                    <label class = "form-check-label" for = "light-mode-check">Normal</label>
                </div>
            @endif
            <h5 class = "mt-3">Status</h5>
            <hr class = "mt-1">
            @if(auth()->user()->getStatusUserAttribute() == true)
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "active" id = "status_compte_active" onclick = "modifierStatusUser()" checked>
                    <label class = "form-check-label" for = "active-status-compte">Activé</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "desactive" id = "status_compte_desactive" onclick = "modifierStatusUser()">
                    <label class = "form-check-label" for = "desactive-status-compte">Désactivé</label>
                </div>
            @else
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "active" id = "status_compte_active" onclick = "modifierStatusUser()">
                    <label class = "form-check-label" for = "active-status-compte">Activé</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "desactive" id = "status_compte_desactive" checked onclick = "modifierStatusUser()">
                    <label class = "form-check-label" for = "desactive-status-compte">Désactivé</label>
                </div>
            @endif
            <h5 class = "mt-3">Suppression de compte</h5>
            <hr class = "mt-1">
            <p>
                Si vous avez choisi de supprimer votre compte, vos informations vos et données personnelles seront définitivement perdus.
            </p>
            <div class = "d-grid mt-3">
                @if(auth()->user()->getRoleUserAttribute() == "Etudiant" || auth()->user()->getRoleUserAttribute() == "Enseignant")
                    <button class = "btn btn-primary" id = "deleteBtn" disabled>Supprimer votre compte</button>
                    <span class = "font-13 text-danger mt-2">Vous n'êtes pas autorisé à utiliser cette fonctionnalité.</span>
                @else
                    <button class = "btn btn-primary" id = "deleteBtn">Supprimer votre compte</button>
                @endif
            </div>
        </div>
    </div>
</div>