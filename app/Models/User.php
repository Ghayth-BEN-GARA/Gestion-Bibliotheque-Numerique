<?php
    namespace App\Models;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable{
        use HasApiTokens, Notifiable;
        protected $table = "users";
        protected $primaryKey = "id_user";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'id_user',
            'nom',
            'prenom',
            "date_naissance",
            "genre",
            "role",
            "mobile",
            "adresse",
            "cin",
            "email",
            "password",
            "image",
            "status",
            "date_time_creation_user"
        ];

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function getNomUserAttribute(){
            return $this->attributes["nom"];
        }

        public function setNomUserAttribute($value){
            $this->attributes["nom"] = $value;
        }

        public function getPrenomUserAttribute(){
            return $this->attributes["prenom"];
        }

        public function setPrenomUserAttribute($value){
            $this->attributes["prenom"] = $value;
        }

        public function getDateNaissanceUserAttribute(){
            return $this->attributes["date_naissance"];
        }

        public function setDateNaissanceUserAttribute($value){
            $this->attributes["date_naissance"] = $value;
        }

        public function getGenreUserAttribute(){
            return $this->attributes["genre"];
        }

        public function setGenreUserAttribute($value){
            $this->attributes["genre"] = $value;
        }

        public function getRoleUserAttribute(){
            return $this->attributes["role"];
        }

        public function setRoleUserAttribute($value){
            $this->attributes["role"] = $value;
        }

        public function getMobileUserAttribute(){
            return $this->attributes["mobile"];
        }

        public function setMobileUserAttribute($value){
            $this->attributes["mobile"] = $value;
        }

        public function getAdresseUserAttribute(){
            return $this->attributes["adresse"];
        }

        public function setAdresseUserAttribute($value){
            $this->attributes["adresse"] = $value;
        }

        public function getCinUserAttribute(){
            return $this->attributes["cin"];
        }

        public function setCinUserAttribute($value){
            $this->attributes["cin"] = $value;
        }

        public function getEmailUserAttribute(){
            return $this->attributes["email"];
        }

        public function setEmailUserAttribute($value){
            $this->attributes["email"] = $value;
        }

        public function getPasswordUserAttribute(){
            return $this->attributes["password"];
        }

        public function setPasswordUserAttribute($value){
            $this->attributes["password"] = $value;
        }

        public function getImageUserAttribute(){
            return $this->attributes["image"];
        }

        public function setImageUserAttribute($value){
            $this->attributes["image"] = $value;
        }

        public function getStatusUserAttribute(){
            return $this->attributes["status"];
        }

        public function setStatusUserAttribute($value){
            $this->attributes["status"] = $value;
        }

        public function getDateTimeCreationUserAttribute(){
            return $this->attributes["date_time_creation_user"];
        }

        public function setDateTimeCreationUserAttribute($value){
            $this->attributes["date_time_creation_user"] = $value;
        }

        public function getFormattedDateNaissanceUserAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateNaissanceUserAttribute())));
        }

        public function getFormattedDateTimeCreationUserAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateTimeCreationUserAttribute())));
        }

        public function getFormattedMobileUserAttribute(){
            return substr($this->getMobileUserAttribute(), 0, 2)." ".substr($this->getMobileUserAttribute(), 2, 3)." ".substr($this->getMobileUserAttribute(), 5, 3);
        }

        public function getFullnameUserAttribute(){
            return $this->getPrenomUserAttribute()." ".$this->getNomUserAttribute();
        }

        public function getFormattedCinUserAttribute(){
            return substr($this->getCinUserAttribute(), 0, 3)." ".substr($this->getCinUserAttribute(), 3, 3)." ".substr($this->getCinUserAttribute(), 6, 2);
        }
    }
?>
