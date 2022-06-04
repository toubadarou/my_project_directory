<?php

namespace App\DataFixtures;

use App\Entity\Professeur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fullNames = ['Baila Wane', 'Aly Tall Niang', 'Malick Mbaye', 'Pape Djiby', 'Diallo Diallo', 'Bay Niass', 'Daouda Diouf'];
        $grades = ['MASTER', 'INSÉNIEUR', 'DOCTEUR'];

        for ($i = 0; $i < 6; $i++) {
            $prof = new Professeur();
            $rand = rand(0, 6);
            $pos = rand(0, 2);
            $prof->setNomComplet($fullNames[$rand]);
            $prof->setGrade($grades[$pos]);
            for ($j = 0; $j < 2; $j++) {
                $ref = rand(0, 9);
                $prof->addClass($this->getReference('Classe' . $ref));
            }
            for ($j = 0; $j < 2; $j++) {
                $ref = rand(0, 6);
                $prof->addModule($this->getReference('Module' . $ref));
            }
            $manager->persist($prof);
        }
        $manager->flush();
    }
}
