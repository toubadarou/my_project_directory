<?php

namespace App\DataFixtures;

use App\Entity\RP;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RpFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $plainPassword = 'passer@123';
        for ($i = 1; $i <= 10; $i++) {
            $rp = new RP();
            $rp->setNomComplet('Nom et Prenom' . $i);
            $rp->setEmail('login_rp'.$i.$i.'@gmail.com');
            $encoded = $this->encoder->hashPassword($rp, $plainPassword);
            $rp->setPassword($encoded);
            $rp->setRoles(["ROLE_RP"]);
            $manager->persist($rp);
            $this->addReference("RP" . $i, $rp);
        }

        $manager->flush();
    }
}
