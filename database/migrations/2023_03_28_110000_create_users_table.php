<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('users', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_user");
                $table->string('nom', 900)->default("Aucun");
                $table->string('prenom', 900)->default("Aucun");
                $table->date('date_naissance')->nullable();
                $table->string('genre', 200)->default("Non spécifié");
                $table->string('role', 90)->default("Étudiant");
                $table->integer("mobile")->default(0);
                $table->string('adresse', 999)->default("Aucun");
                $table->integer("cin")->default(0);
                $table->string('email')->unique();
                $table->string('password', 999)->default("Aucun");
                $table->string("image", 999)->default("images_profils/user.png");
                $table->boolean('status')->default(true);
                $table->datetime("date_time_creation_user")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("genre")->references("sexe")->on("genres")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("role")->references("nom_acteur")->on("acteurs")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('users');
        }
    };
?>
