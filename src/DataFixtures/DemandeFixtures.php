<?php

namespace App\DataFixtures;

use App\Entity\Demande;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;

class DemandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $motifs = ['Trouver un nouveau emploi', 'difficultés de déplacements et questions d`insecurité', 'un voyage inattendu'];
        for ($i = 0; $i < 10; $i++) {
            $demande = new Demande;
            $rand = rand(0, 2);
            $demande->setMotif($motifs[$rand])
                ->setDate(new \DateTime('now'));
            $manager->persist($demande);
            $this->addReference('demande' . $i, $demande);
        }

        $manager->flush();
    }
}
