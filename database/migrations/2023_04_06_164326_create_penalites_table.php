<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         */
        public function up(): void{
            Schema::create('penalites', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_penalite");
                $table->bigInteger("id_user")->unsigned()->nullable();
                $table->bigInteger("id_reservation")->unsigned()->nullable();
                $table->integer("nbr_jour")->default(0);
                $table->date("date_start")->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_reservation")->references("id_reservation")->on("reservations")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void{
            Schema::dropIfExists('penalites');
        }
    };
?>
