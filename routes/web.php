<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;

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
?>
