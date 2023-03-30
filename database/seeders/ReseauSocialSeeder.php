<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\ReseauSocial;

    class ReseauSocialSeeder extends Seeder{
        /**
         * Run the database seeds.
         */
        public function run(): void{
            $reseau = new ReseauSocial();
            $reseau->setIdUserAttribute(1);
            $reseau->save();
        }
    }
?>
