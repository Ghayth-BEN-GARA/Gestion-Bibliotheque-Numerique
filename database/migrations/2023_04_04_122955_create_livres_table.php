<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('livres', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_livre");
                $table->integer("code_livre")->default(0);
                $table->string("titre_livre", 700)->default("Aucun");
                $table->string("auteur_livre", 700)->default("Aucun");
                $table->string("image_livre", 999)->default("Aucun");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('livres');
        }
    };
?>
