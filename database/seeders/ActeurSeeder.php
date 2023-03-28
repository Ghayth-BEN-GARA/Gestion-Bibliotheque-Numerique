<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Acteur;

    class ActeurSeeder extends Seeder{
        /**
         * Run the database seeds.
         */
        public function run(): void{
            $acteur1 = new Acteur();
            $acteur1->setNomActeurAttribute("Bibliothécaire");
            $acteur1->save();

            $acteur2 = new Acteur();
            $acteur2->setNomActeurAttribute("Enseignant");
            $acteur2->save();

            $acteur3 = new Acteur();
            $acteur3->setNomActeurAttribute("Étudiant");
            $acteur3->save();
        }
    }
?>
