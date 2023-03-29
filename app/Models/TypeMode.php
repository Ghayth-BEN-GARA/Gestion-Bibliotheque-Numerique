<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class TypeMode extends Model{
        protected $table = "types_modes";
        protected $primaryKey = "id_type_mode";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_type_mode",
            "type_mode",
            "id_user"
        ];

        public function getIdTypeModeAttribute(){
            return $this->attributes["id_type_mode"];
        }

        public function getTypeModeAttribute(){
            return $this->attributes["type_mode"];
        }

        public function setTypeModeAttribute($value){
            $this->attributes["type_mode"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
