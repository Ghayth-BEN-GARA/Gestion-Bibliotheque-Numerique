<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Etudiant extends Model{
        protected $table = "etudiants";
        protected $primaryKey = "id_etudiant";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_etudiant",
            "niveau",
            "matricule",
            "id_user"
        ];

        public function getIdEtudiantAttribute(){
            return $this->attributes["id_etudiant"];
        }

        public function getNiveauAttribute(){
            return $this->attributes["niveau"];
        }

        public function setNiveauAttribute($value){
            $this->attributes["niveau"] = $value;
        }

        public function getMatriculeAttribute(){
            return $this->attributes["matricule"];
        }

        public function setMatriculeAttribute($value){
            $this->attributes["matricule"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
