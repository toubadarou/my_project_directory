<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EtudiantFixtures extends Fixture
{
    private $encoder;
    public function __construct( UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $plainPassword = 'passer@123';
        for ($i = 0; $i < 10; $i++) {
            $user = new Etudiant();
            $user->setNomComplet('Nom et Prenom' . $i);
            $user->setEmail('login_etu' . $i);
            $encoded = $this->encoder->hashPassword($user, $plainPassword);
            $user->setPassword($encoded);
            $user->setRoles(["ROLE_ETUDIANT"]);
            $user->setAdresse("Adresse " . $i);
            $user->setMatricule("0000" + $i);
            $user->setSexe("M");
            $manager->persist($user);
            $this->addReference("Etudiant" . $i, $user);
        }
        $manager->flush();
    }
}
