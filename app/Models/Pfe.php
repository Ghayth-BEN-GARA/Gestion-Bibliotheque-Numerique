<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Pfe extends Model{
        protected $table = "pfes";
        protected $primaryKey = "id_pfe";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_pfe",
            "titre",
            "description",
            "pdf",
            "date_creation_pdf",
            "id_annee_universitaire"
        ];

        public function getIdPfeAttribute(){
            return $this->attributes["id_pfe"];
        }

        public function getTitreAttribute(){
            return $this->attributes["titre"];
        }

        public function setTitreAttribute($value){
            $this->attributes["titre"] = $value;
        }

        public function getDescriptionAttribute(){
            return $this->attributes["description"];
        }

        public function setDescriptionAttribute($value){
            $this->attributes["description"] = $value;
        }

        public function getPdfAttribute(){
            return $this->attributes["pdf"];
        }

        public function setPdfAttribute($value){
            $this->attributes["pdf"] = $value;
        }

        public function getDateCreationPdfAttribute(){
            return $this->attributes["date_creation_pdf"];
        }

        public function setDateCreationPdfAttribute($value){
            $this->attributes["date_creation_pdf"] = $value;
        }

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function setIdAnneeUniversitaireAttribute($value){
            $this->attributes["id_annee_universitaire"] = $value;
        }

        public function getFormattedDateCreationPdfAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateCreationPdfAttribute())));
        }
    }
?>
