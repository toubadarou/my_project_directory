<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modules = ['PHP', 'JS', 'JAVA', 'POO', 'HTML', 'CSS', 'BOOTSTRAP'];
        for ($i = 0; $i < 10; $i++) {
            $module = new Module();
            $rand = rand(0, 6);
            $module->setNom($modules[$rand]);
            $manager->persist($module);
            $this->addReference("Module" . $i, $module);
        }

        $manager->flush();
    }
}
