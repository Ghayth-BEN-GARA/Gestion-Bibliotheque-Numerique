<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class AnneeUniversitaire extends Model{
        protected $table = "annees_universitaires";
        protected $primaryKey = "id_annee_universitaire";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_annee_universitaire",
            "debut",
            "fin"
        ];

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function getDebutAttribute(){
            return $this->attributes["debut"];
        }

        public function setDebutAttribute($value){
            $this->attributes["debut"] = $value;
        }

        public function getFinAttribute(){
            return $this->attributes["fin"];
        }

        public function setFinAttribute($value){
            $this->attributes["fin"] = $value;
        }

        public function getFormattedDebutAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDebutAttribute())));
        }

        public function getFormattedFinAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getFinAttribute())));
        }
    }
?>
