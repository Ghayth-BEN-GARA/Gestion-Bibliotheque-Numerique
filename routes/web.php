<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProfilController;
    use App\Http\Controllers\JournalController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\AnneeUniversitaireController;
    use App\Http\Controllers\PfeController;
    use App\Http\Controllers\LivreController;
    use App\Http\Controllers\ReservationController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::controller(AuthentificationController::class)->group(function() {
        Route::get('/', 'ouvrirLogin')->middleware("session_exist");
        Route::post('/login-user', 'gestionLoginUser');
        Route::get('/forget-password', 'ouvrirForgetPassword')->middleware("session_exist");
        Route::post('/send-link-reset-compte', 'gestionEnvoyerLienForgetPassword');
        Route::get('/reset-password', 'ouvrirResetPassword')->middleware("session_exist");
        Route::post('/reset-compte', 'gestionResetCompte');
        Route::get('/logout', 'gestionLogout');
    });

    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'ouvrirDashboard')->middleware("session_not_exist");
        Route::get('/404', 'ouvrir404');
        Route::get('/update-type-mode', 'modifierTypeMode');
        Route::get('/help', 'ouvrirAide')->middleware("session_not_exist");
        Route::get('/contact', 'ouvrirContact')->middleware("session_not_exist");
        Route::post('/send-mail-contact', 'gestionEnvoyerMailContact');
    });

    Route::controller(ProfilController::class)->group(function() {
        Route::get('/update-status-user', 'modifierStatusUser');
        Route::get('/delete-compte', 'gestionSupprimerCompte');
        Route::get('/profil', 'ouvrirProfil')->middleware("session_not_exist");
        Route::get('/edit-photo-profil', 'ouvrirEditPhotoProfil')->middleware("session_not_exist");
        Route::post('/modifier-photo-profil', 'gestionModifierPhotoDeProfil');
        Route::post('/modifier-informations-basic', 'gestionModifierInformationsBasique');
        Route::post('/modifier-reseaux-sociaux', 'gestionModifierReseauxSociaux');
        Route::post('/modifier-email', 'gestionModifierEmail');
        Route::post('/modifier-password', 'gestionModifierPassword');
    });

    Route::controller(JournalController::class)->group(function() {
        Route::get('/journal', 'ouvrirJournal')->middleware("session_not_exist");
        Route::get('/delete-journal-authentfication', 'gestionSupprimerJournal');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/liste-users', 'ouvrirListeUsers')->middleware("session_not_bibliothecaire");
        Route::get('/add-user', 'ouvrirAddUser')->middleware("session_not_bibliothecaire");
        Route::post('/creer-etudiant', 'gestionCreerEtudiant');
        Route::post('/modifier-etudiant', 'gestionModifierEtudiant');
        Route::post('/creer-enseignant', 'gestionCreerEnseignant');
        Route::post('/modifier-enseignant', 'gestionModifierEnseignant');
        Route::get('/delete-user', 'gestionSupprimerUser');
        Route::get('/user', 'ouvrirUser')->middleware("session_not_bibliothecaire");
        Route::get('/edit-user', 'ouvrirEditUser')->middleware("session_not_bibliothecaire");
        Route::post('/update-etudiant', 'gestionUpdateEtudiant');
        Route::post('/update-enseignant', 'gestionUpdateEnseignant');
    });

    Route::controller(AnneeUniversitaireController::class)->group(function() {
        Route::get('/liste-annees-universitaire', 'ouvrirListeAnneesUniversitaire')->middleware("session_not_bibliothecaire");
        Route::get('/add-annee-universitaire', 'ouvrirAddAnneeUniversitaire')->middleware("session_not_bibliothecaire");
        Route::post('/creer-annee-univeritaire', 'gestionCreerAnneeUniversitaire');
        Route::get('/delete-annee-universitaire', 'gestionSupprimerAnneeUniversitaire');
        Route::get('/annee-universitaire', 'ouvrirAnneeUniversitaire')->middleware("session_not_bibliothecaire");
        Route::get('/edit-annee-universitaire', 'ouvrirEditAnneeUniversitaire')->middleware("session_not_bibliothecaire");
        Route::post('/modifier-annee-univeritaire', 'gestionModifierAnneeUniversitaire');
    });
    
    Route::controller(PfeController::class)->group(function() {
        Route::get('/liste-pfes', 'ouvrirListePfes')->middleware("session_not_exist");
        Route::get('/add-pfe', 'ouvrirAddPfe')->middleware("session_not_bibliothecaire");
        Route::post('/creer-pfe', 'gestionCreerPfe');
        Route::get('/delete-pfe', 'gestionDeletePfe');
        Route::get('/download-pfe', 'downloadPdf');
        Route::get('/pfe', 'ouvrirPfe')->middleware("session_not_exist");
        Route::get('/edit-pfe', 'ouvrirEditPfe')->middleware("session_not_bibliothecaire");
        Route::post('/modifier-pfe', 'gestionModifierPfe');
    });
    
    Route::controller(LivreController::class)->group(function() {
        Route::get('/liste-livres', 'ouvrirListeLivres')->middleware("session_not_bibliothecaire");
        Route::get('/add-livre', 'ouvrirAddLivre')->middleware("session_not_bibliothecaire");
        Route::post('/creer-livre', 'gestionCreerLivre');
        Route::get('/delete-livre', 'gestionDeleteLivre');
        Route::get('/edit-livre', 'ouvrirEditLivre')->middleware("session_not_bibliothecaire");
        Route::post('/modifier-livre', 'gestionModifierLivre');
    });

    Route::controller(ReservationController::class)->group(function() {
        Route::get('/liste-livres-reservations', 'ouvrirListeLivresReservations')->middleware("session_not_etudiant_not_enseignant");
        Route::get('/add-reservation', 'ouvrirAddReservation')->middleware("session_not_etudiant_not_enseignant");
        Route::post('/creer-reservation', 'gestionCreerReservation');
        Route::get('/mes-reservations', 'ouvrirMesReservation')->middleware("session_not_etudiant_not_enseignant");
        Route::get('/annuler-reservation', 'gestionAnnulerReservation');
        Route::get('/edit-reservation', 'ouvrirEditReservation')->middleware("session_not_etudiant_not_enseignant");
        Route::post('/modifier-reservation', 'gestionModifierReservation');
        Route::get('/reservation', 'ouvrirReservation')->middleware("session_not_etudiant_not_enseignant");
        Route::get('/liste-reservations', 'ouvrirListeReservations')->middleware("session_not_bibliothecaire");
        Route::get('/reservation-bibliothecaire', 'ouvrirReservationBibliothecaire')->middleware("session_not_bibliothecaire");
        Route::get('/envoyer-alert-reservation', 'gestionEnvoyerAlerteReservation');
    });
?>
