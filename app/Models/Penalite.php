<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Penalite extends Model{
        protected $table = "penalites";
        protected $primaryKey = "id_penalite";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_penalite",
            "id_user",
            "nbr_jour"
        ];

        public function getIdPenaliteAttribute(){
            return $this->attributes["id_penalite"];
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }

        public function getNbrJourAttribute(){
            return $this->attributes["nbr_jour"];
        }

        public function setNbrJourAttribute($value){
            $this->attributes["nbr_jour"] = $value;
        }
    }
?>