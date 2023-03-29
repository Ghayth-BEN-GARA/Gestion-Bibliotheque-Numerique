<?php
    namespace Database\Seeders;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder{
        /**
         * Seed the application's database.
         */
        public function run(): void{
            $this->call([
                ActeurSeeder::class,
                GenreSeeder::class,
                UserSeeder::class,
                JournalAuthSeeder::class,
                TypeModeSeeder::class
            ]);
        }
    }
?>
