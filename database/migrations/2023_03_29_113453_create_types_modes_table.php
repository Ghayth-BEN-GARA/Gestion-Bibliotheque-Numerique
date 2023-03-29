<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('types_modes', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_type_mode");
                $table->string("type_mode", 30)->default("Light");
                $table->bigInteger("id_user")->unsigned()->nullable();
                $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('types_modes');
        }
    };
?>
