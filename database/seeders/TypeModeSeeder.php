<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\TypeMode;

    class TypeModeSeeder extends Seeder{
        /**
         * Run the database seeds.
         */
        public function run(): void{
            $mode = new TypeMode();
            $mode->setIdUserAttribute(1);
            $mode->save();
        }
    }
?>
