<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Reservation extends Model{
        protected $table = "reservations";
        protected $primaryKey = "id_reservation";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_reservation",
            "date_pret",
            "date_retour",
            "is_returned",
            "id_livre",
            "id_user",
            "date_time_creation_reservation"
        ];

        public function getIdReservationAttribute(){
            return $this->attributes["id_reservation"];
        }

        public function getDatePretAttribute(){
            return $this->attributes["date_pret"];
        }

        public function setDatePretAttribute($value){
            $this->attributes["date_pret"] = $value;
        }

        public function getDateRetourAttribute(){
            return $this->attributes["date_retour"];
        }

        public function setDateRetourAttribute($value){
            $this->attributes["date_retour"] = $value;
        }

        public function getIsReturnedAttribute(){
            return $this->attributes["is_returned"];
        }

        public function setIsReturnedAttribute($value){
            $this->attributes["is_returned"] = $value;
        }

        public function getIdLivreAttribute(){
            return $this->attributes["id_livre"];
        }

        public function setIdLivreAttribute($value){
            $this->attributes["id_livre"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }

        public function getDateTimeCreationReservationAttribute(){
            return $this->attributes["date_time_creation_reservation"];
        }

        public function setDateTimeCreationReservationAttribute($value){
            $this->attributes["date_time_creation_reservation"] = $value;
        }

        public function getFormattedDatePretAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDatePretAttribute())));
        }

        public function getFormattedDateRetourAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateRetourAttribute())));
        }

        public function getFormattedDateTimeCreationReservationAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateTimeCreationReservationAttribute())));
        }
    }
?>
