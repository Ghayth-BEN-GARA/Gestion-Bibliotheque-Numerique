<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProfilController;
    use App\Http\Controllers\JournalController;
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
?>
