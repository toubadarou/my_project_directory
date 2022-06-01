<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $libelles = ['Rose Dieng', 'Cheikh Anta', 'Hambathe Ba'];
        $filieres = ['Dev Web', 'Dev Mobile', 'Dev Data'];
        $niveaux = ['L1', 'L2', 'L3'];
        for ($i = 0; $i < 10; $i++) {
            $classe = new Classe;
            $rand = rand(0, 2);
            $classe->setFiliere($filieres[$rand])
                ->setNiveau($niveaux[$rand])
                ->setLibelle($libelles[$rand]);
            $manager->persist($classe);
            $this->addReference('Classe' . $i, $classe);
        }

        $manager->flush();
    }
}
