<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('genres', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->string("sexe", 200)->primary();
            });
    }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('genre');
        }
    };
?>
