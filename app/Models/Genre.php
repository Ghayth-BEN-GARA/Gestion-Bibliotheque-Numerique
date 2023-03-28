<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Genre extends Model{
        protected $table = "genres";
        protected $primaryKey = "sexe";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "sexe"
        ];

        public function getSexeAttribute(){
            return $this->attributes["sexe"];
        }

        public function setSexeAttribute($value){
            $this->attributes["sexe"] = $value;
        }
    }
?>
