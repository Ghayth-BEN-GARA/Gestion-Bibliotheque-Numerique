<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Enseignant extends Model{
        protected $table = "enseignants";
        protected $primaryKey = "id_enseignant";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_enseignant",
            "grade",
            "specialite",
            "id_user"
        ];

        public function getIdEnseignantAttribute(){
            return $this->attributes["id_enseignant"];
        }

        public function getGradeAttribute(){
            return $this->attributes["grade"];
        }

        public function setGradeAttribute($value){
            $this->attributes["grade"] = $value;
        }

        public function getSpecialiteAttribute(){
            return $this->attributes["specialite"];
        }

        public function setSpecialiteAttribute($value){
            $this->attributes["specialite"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
