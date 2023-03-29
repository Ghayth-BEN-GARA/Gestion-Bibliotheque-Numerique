<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\TypeMode;

    class DashboardController extends Controller{
        public function ouvrirDashboard(){
            return view("home");
        }

        public static function getTypeModeCompteUser(){
            return TypeMode::where("id_user", "=", auth()->user()->getIdUserAttribute())->first();
        }
    }
?>
