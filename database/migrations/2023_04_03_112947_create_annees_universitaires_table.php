<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('annees_universitaires', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_annee_universitaire");
                $table->year("debut")->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->year("fin")->default(DB::raw('CURRENT_TIMESTAMP'));
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('annees_universitaires');
        }
    };
?>
