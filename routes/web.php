<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProfilController;
    use App\Http\Controllers\JournalController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\AnneeUniversitaireController;
    use App\Http\Controllers\PfeController;
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
    Route::get("/",[AuthentificationController::class,"ouvrirLogin"])->middleware("session_exist");
    Route::post("/login-user",[AuthentificationController::class,"gestionLoginUser"]);
    Route::get("/dashboard",[DashboardController::class,"ouvrirDashboard"])->middleware("session_not_exist");
    Route::get("/forget-password",[AuthentificationController::class,"ouvrirForgetPassword"])->middleware("session_exist");
    Route::post("/send-link-reset-compte",[AuthentificationController::class,"gestionEnvoyerLienForgetPassword"]);
    Route::get("/reset-password",[AuthentificationController::class,"ouvrirResetPassword"])->middleware("session_exist");
    Route::post("/reset-compte",[AuthentificationController::class,"gestionResetCompte"]);
    Route::get("/logout",[AuthentificationController::class,"gestionLogout"]);
    Route::get("/404",[DashboardController::class,"ouvrir404"]);
    Route::get("/update-type-mode",[DashboardController::class,"modifierTypeMode"]);
    Route::get("/update-status-user",[ProfilController::class,"modifierStatusUser"]);
    Route::get("/journal",[JournalController::class,"ouvrirJournal"])->middleware("session_not_exist");
    Route::get("/delete-journal-authentfication",[JournalController::class,"gestionSupprimerJournal"]);
    Route::get("/help",[DashboardController::class,"ouvrirAide"])->middleware("session_not_exist");
    Route::get("/contact",[DashboardController::class,"ouvrirContact"])->middleware("session_not_exist");
    Route::get("/delete-compte",[ProfilController::class,"gestionSupprimerCompte"]);
    Route::post("/send-mail-contact",[DashboardController::class,"gestionEnvoyerMailContact"]);
    Route::get("/profil",[ProfilController::class,"ouvrirProfil"])->middleware("session_not_exist");
    Route::get("/edit-photo-profil",[ProfilController::class,"ouvrirEditPhotoProfil"])->middleware("session_not_exist");
    Route::post("/modifier-photo-profil",[ProfilController::class,"gestionModifierPhotoDeProfil"]);
    Route::post("/modifier-informations-basic",[ProfilController::class,"gestionModifierInformationsBasique"]);
    Route::post("/modifier-reseaux-sociaux",[ProfilController::class,"gestionModifierReseauxSociaux"]);
    Route::post("/modifier-email",[ProfilController::class,"gestionModifierEmail"]);
    Route::post("/modifier-password",[ProfilController::class,"gestionModifierPassword"]);
    Route::get("/liste-users",[UserController::class,"ouvrirListeUsers"])->middleware("session_not_bibliothecaire");
    Route::get("/add-user",[UserController::class,"ouvrirAddUser"])->middleware("session_not_bibliothecaire");
    Route::post("/creer-etudiant",[UserController::class,"gestionCreerEtudiant"]);
    Route::post("/modifier-etudiant",[ProfilController::class,"gestionModifierEtudiant"]);
    Route::post("/creer-enseignant",[UserController::class,"gestionCreerEnseignant"]);
    Route::post("/modifier-enseignant",[ProfilController::class,"gestionModifierEnseignant"]);
    Route::get("/delete-user",[UserController::class,"gestionSupprimerUser"]);
    Route::get("/user",[UserController::class,"ouvrirUser"])->middleware("session_not_bibliothecaire");
    Route::get("/edit-user",[UserController::class,"ouvrirEditUser"])->middleware("session_not_bibliothecaire");
    Route::post("/update-etudiant",[UserController::class,"gestionUpdateEtudiant"]);
    Route::post("/update-enseignant",[UserController::class,"gestionUpdateEnseignant"]);
    Route::get("/liste-annees-universitaire",[AnneeUniversitaireController::class,"ouvrirListeAnneesUniversitaire"])->middleware("session_not_bibliothecaire");
    Route::get("/add-annee-universitaire",[AnneeUniversitaireController::class,"ouvrirAddAnneeUniversitaire"])->middleware("session_not_bibliothecaire");
    Route::post("/creer-annee-univeritaire",[AnneeUniversitaireController::class,"gestionCreerAnneeUniversitaire"]);
    Route::get("/delete-annee-universitaire",[AnneeUniversitaireController::class,"gestionSupprimerAnneeUniversitaire"]);
    Route::get("/annee-universitaire",[AnneeUniversitaireController::class,"ouvrirAnneeUniversitaire"])->middleware("session_not_bibliothecaire");
    Route::get("/edit-annee-universitaire",[AnneeUniversitaireController::class,"ouvrirEditAnneeUniversitaire"])->middleware("session_not_bibliothecaire");
    Route::post("/modifier-annee-univeritaire",[AnneeUniversitaireController::class,"gestionModifierAnneeUniversitaire"]);
    Route::get("/liste-pfes",[PfeController::class,"ouvrirListePfes"])->middleware("session_not_exist");
    Route::get("/add-pfe",[PfeController::class,"ouvrirAddPfe"])->middleware("session_not_bibliothecaire");
    Route::post("/creer-pfe",[PfeController::class,"gestionCreerPfe"]);
?>
