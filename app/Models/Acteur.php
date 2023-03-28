<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Acteur extends Model{
        protected $table = "acteurs";
        protected $primaryKey = "nom_acteur";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "nom_acteur"
        ];

        public function getNomActeurAttribute(){
            return $this->attributes["nom_acteur"];
        }

        public function setNomActeurAttribute($value){
            $this->attributes["nom_acteur"] = $value;
        }
    }
?>
