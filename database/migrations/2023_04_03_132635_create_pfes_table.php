<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('pfes', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_pfe");
                $table->string("titre", 700)->default("Aucun");
                $table->string("description", 999)->default("Aucun");
                $table->string("pdf", 999)->default("Aucun");
                $table->datetime("date_creation_pdf")->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->bigInteger("id_annee_universitaire")->unsigned()->nullable();
                $table->foreign("id_annee_universitaire")->references("id_annee_universitaire")->on("annees_universitaires")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('pfes');
        }
    };
?>
