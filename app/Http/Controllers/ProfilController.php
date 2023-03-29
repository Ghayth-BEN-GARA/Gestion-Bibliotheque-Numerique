<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;

    class ProfilController extends Controller{
        public function modifierStatusUser(Request $request){
            return User::where("id_user", "=", auth()->user()->getIdUserAttribute())->update([
                "status" => $request->status
            ]);
        }
    }
?>
