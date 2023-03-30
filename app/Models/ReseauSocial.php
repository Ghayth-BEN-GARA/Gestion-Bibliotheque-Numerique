<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class ReseauSocial extends Model{
        protected $table = "reseaux_sociaux_table";
        protected $primaryKey = "id_reseaux";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_reseaux",
            "link_facebook",
            "link_instagram",
            "link_github",
            "link_linkedin",
            "id_user"
        ];

        public function getIdReseauxAttribute(){
            return $this->attributes["id_reseaux"];
        }

        public function getLinkFacebookAttribute(){
            return $this->attributes["link_facebook"];
        }

        public function setLinkFacebookAttribute($value){
            $this->attributes["link_facebook"] = $value;
        }

        public function getLinkInstagramAttribute(){
            return $this->attributes["link_instagram"];
        }

        public function setLinkInstagramAttribute($value){
            $this->attributes["link_instagram"] = $value;
        }

        public function getLinkGithubAttribute(){
            return $this->attributes["link_github"];
        }

        public function setLinkGithubAttribute($value){
            $this->attributes["link_github"] = $value;
        }

        public function getLinkLinkedinAttribute(){
            return $this->attributes["link_linkedin"];
        }

        public function setLinkLinkedinAttribute($value){
            $this->attributes["link_linkedin"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
