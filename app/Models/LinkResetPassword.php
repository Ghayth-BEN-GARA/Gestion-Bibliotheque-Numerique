<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class LinkResetPassword extends Model{
        protected $table = "links_reset_passwords";
        protected $primaryKey = "id_link";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_link",
            "token",
            "id_user",
            "date_time_creation_link"
        ];

        public function getIdLinkAttribute(){
            return $this->attributes["id_link"];
        }

        public function getTokenAttribute(){
            return $this->attributes["token"];
        }

        public function setTokenAttribute($value){
            $this->attributes["token"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }

        public function getDateTimeCreationLinkAttribute(){
            return $this->attributes["date_time_creation_link"];
        }

        public function setDateTimeCreationLinkAttribute($value){
            $this->attributes["date_time_creation_link"] = $value;
        }

        public function getFormattedDateTimeCreationLinkAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateTimeCreationLinkAttribute())));
        }
    }
?>
