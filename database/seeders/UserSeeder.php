<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Hash;
    use App\Models\User;

    class UserSeeder extends Seeder{
        /**
         * Run the database seeds.
         */
        public function run(): void{
            $user1 = new User();
            $user1->setNomUserAttribute("Numérique");
            $user1->setPrenomUserAttribute("Bibliothéque");
            $user1->setDateNaissanceUserAttribute(now());
            $user1->setGenreUserAttribute("Non spécifié");
            $user1->setRoleUserAttribute("Bibliothécaire");
            $user1->setMobileUserAttribute(12345678);
            $user1->setAdresseUserAttribute("Sfax");
            $user1->setCinUserAttribute(10000000);
            $user1->setEmailUserAttribute("biblio@gmail.com");
            $user1->setPasswordUserAttribute(Hash::make("0000"));
            $user1->save();
        }
    }
?>
