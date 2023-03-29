<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('links_reset_passwords', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id('id_link');
                $table->string('token', 999)->default("Aucun");
                $table->bigInteger("id_user")->unsigned()->nullable();
                $table->datetime("date_time_creation_link")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('links_reset_passwords');
        }
    };
?>
