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