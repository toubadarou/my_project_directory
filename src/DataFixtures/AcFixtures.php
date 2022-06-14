<?php

namespace App\DataFixtures;

use App\Entity\AC;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AcFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $plainPassword = 'passer@123';
        for ($i = 0; $i < 10; $i++) {
            $ac = new AC();
            $ac->setNomComplet('Nom et Prenom de ac' . $i);
            $ac->setEmail('login_ac'.$i.'@gmail.com');
            $encoded = $this->encoder->hashPassword($ac, $plainPassword);
            $ac->setPassword($encoded);
            $ac->setRoles(["ROLE_AC"]);
            $manager->persist($ac);
            $this->addReference("AC" . $i, $ac);
        }
        $manager->flush();
    }
}
