<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Genre;

    class GenreSeeder extends Seeder{
        /**
         * Run the database seeds.
         */
        public function run(): void{
            $genre1 = new Genre();
            $genre1->setSexeAttribute("Femme");
            $genre1->save();

            $genre2 = new Genre();
            $genre2->setSexeAttribute("Homme");
            $genre2->save();

            
            $genre3 = new Genre();
            $genre3->setSexeAttribute("Non spécifié");
            $genre3->save();
        }
    }
?>
