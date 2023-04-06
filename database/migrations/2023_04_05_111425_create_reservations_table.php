<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('reservations', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_reservation");
                $table->date("date_pret")->nullable();
                $table->date("date_retour")->nullable();
                $table->boolean("is_returned")->default(false);
                $table->bigInteger("id_livre")->unsigned()->nullable();
                $table->bigInteger("id_user")->unsigned()->nullable();
                $table->datetime("date_time_creation_reservation")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("id_livre")->references("id_livre")->on("livres")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('reservations');
        }
    };
?>
