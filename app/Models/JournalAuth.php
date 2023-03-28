<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class JournalAuth extends Model{
        protected $table = "journals_auth";
        protected $primaryKey = "id_journal";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_journal",
            "titre",
            "description",
            "date_time_journal_auth",
            "id_user"
        ];

        public function getIdJournalAttribute(){
            return $this->attributes["id_journal"];
        }

        public function getTitleAttribute(){
            return $this->attributes["titre"];
        }

        public function setTitleAttribute($value){
            $this->attributes["titre"] = $value;
        }

        public function getDescriptionAttribute(){
            return $this->attributes["description"];
        }

        public function setDescriptionAttribute($value){
            $this->attributes["description"] = $value;
        }

        public function getDateTimeJournalAuthAttribute(){
            return $this->attributes["date_time_journal_auth"];
        }

        public function setDateTimeJournalAuthAttribute($value){
            $this->attributes["date_time_journal_auth"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }

        public function getFormattedDateTimeJournalAuthAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateTimeJournalAuthAttribute())));
        }
    }
?>