function questionDeconnexion() {
    swal({
        title: "Déconnexion",
        text: "Vous êtes sûr de fermer votre session ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "420px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Déconnexion en cours..").then(
                location.href = "/logout"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

async function chargement(message) {
    swal({
        text: message,
        allowEscapeKey: false,
        allowOutsideClick: false,
        padding: "2em",
        width: "400px",
        onOpen: () => {
            swal.showLoading();
        }
    })
}

function modifierTypeMode() {
    var type_mode = null;

    if($("#dark-mode-check").is(":checked")){
        type_mode = "Dark";
    }

    else{
        type_mode = "Light";
    }

    modifierTypeModelRequest(type_mode);
}

function modifierTypeModelRequest(type) {
    $.ajax({
        url: '/update-type-mode',
        type: "get",
        cache: true,
        data: { 
            mode: type
        }
    })
}

function modifierStatusUser() {
    var status = null;

    if($("#status_compte_active").is(":checked")){
        status = 1;
    }

    else{
        status = 0;
    }

    modifierStatusUserRequest(status);
}

function modifierStatusUserRequest(status) {
    $.ajax({
        url: '/update-status-user',
        type: "get",
        cache: true,
        data: { 
            status: status
        }
    })
}

function questionSupprimerJournalAuthentification() {
    swal({
        title: "Journal d'authentification",
        text: "Vous êtes sûr de supprimer votre journal d'authentification ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "515px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-journal-authentfication"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerCompte() {
    swal({
        title: "Compte",
        text: "Vous êtes sûr de supprimer votre compte ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "515px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-compte"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerUtilisateur(id_user) {
    swal({
        title: "Utilisateur",
        text: "Vous êtes sûr de supprimer cette utilisateur ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "515px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-user?id_user="+id_user
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerAnneeUniversitaire(id_annee_universitaire) {
    swal({
        title: "Année universitaire",
        text: "Vous êtes sûr de supprimer cette année universitaire ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "515px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-annee-universitaire?id_annee_universitaire="+id_annee_universitaire
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerPfe(id_pfe) {
    swal({
        title: "PFE",
        text: "Vous êtes sûr de supprimer ce PFE ?",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#29409A',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: "2em",
        width: "515px",
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-pfe?id_pfe="+id_pfe
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}