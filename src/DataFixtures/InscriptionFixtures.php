<?php

namespace App\DataFixtures;

use App\Entity\Inscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InscriptionFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $data = new Inscription();
        for ($i = 0; $i < 10; $i++) {
            $annee = rand(2019, 2022);
            $data->setAnnneeScolaire($this->getReference("AnneeScolaire" . $annee))
                ->setDate(new \DateTime())
                ->setClasse($this->getReference("Classe" . $i))
                ->setEtudiant($this->getReference("Etudiant" . $i));
            $manager->persist($data);
            $this->addReference("Inscription" . $i, $data);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            EtudiantFixtures::class,
            ClasseFixtures::class,
        );
    }
}
