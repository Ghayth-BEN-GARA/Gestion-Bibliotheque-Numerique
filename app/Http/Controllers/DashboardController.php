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

        public function ouvrir404(){
            return view("Errors.404");
        }

        public function modifierTypeMode(Request $request){
            return TypeMode::where("id_user", "=", auth()->user()->getIdUserAttribute())->update([
                "type_mode" => $request->mode
            ]);
        }
    }
?>
