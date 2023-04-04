<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Livre extends Model{
        protected $table = "livres";
        protected $primaryKey = "id_livre";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_livre",
            "code_livre",
            "titre_livre",
            "auteur_livre",
            "image_livre"
        ];

        public function getIdLivreAttribute(){
            return $this->attributes["id_livre"];
        }

        public function getCodeLivreAttribute(){
            return $this->attributes["code_livre"];
        }

        public function setCodeLivreAttribute($value){
            $this->attributes["code_livre"] = $value;
        }

        public function getTitreLivreAttribute(){
            return $this->attributes["titre_livre"];
        }

        public function setTitreLivreAttribute($value){
            $this->attributes["titre_livre"] = $value;
        }

        public function getAuteurLivreAttribute(){
            return $this->attributes["auteur_livre"];
        }

        public function setAuteurLivreAttribute($value){
            $this->attributes["auteur_livre"] = $value;
        }

        public function getImageLivreAttribute(){
            return $this->attributes["image_livre"];
        }

        public function setImageLivreAttribute($value){
            $this->attributes["image_livre"] = $value;
        }
    }
?>