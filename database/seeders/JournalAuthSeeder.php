<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\JournalAuth;

    class JournalAuthSeeder extends Seeder{    
        /**
        * Run the database seeds.
        */
        public function run(): void{
            $journal = new JournalAuth();
            $journal->setTitleAttribute("Inscription");
            $journal->setDescriptionAttribute("Créez un nouveau compte pour le bibliothécaire en ajoutant les informations nécessaires à l'inscription.");
            $journal->setIdUserAttribute(1);
            $journal->save();
        }
    }
?>