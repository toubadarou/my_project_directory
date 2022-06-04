<?php
namespace App\DataFixtures;
use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Faker\Factory::create('fr_FR');
        // // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        // $auteurs = array();
        // for ($i = 0; $i < 10; $i++) {
        //     $auteurs[$i] = new Classe();
        //     $auteurs[$i]->setLibelle($faker->lastName);
        //     $auteurs[$i]->setFiliere($faker->firstName);
        //     $auteurs[$i]->setNiveau($faker->address);

        //     $manager->persist($auteurs[$i]);
        // }

        $manager->flush();
    }
}
