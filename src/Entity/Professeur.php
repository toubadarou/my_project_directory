<?php

namespace App\Entity;

use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Personne;
use PhpParser\Node\Expr\Cast;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Cascade;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends Personne
{
    #[ORM\Column(type: 'string', length: 255)]
    private $grade;

    #[ORM\ManyToMany(targetEntity: Classe::class, inversedBy: 'professeurs', cascade: ['persist'])]
    private $classes;

    #[ORM\ManyToMany(targetEntity: Module::class, mappedBy: 'professeurs', cascade: ['persist'])]
    private $modules;
    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        $this->classes->removeElement($class);

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
            $module->addProfesseur($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->removeElement($module)) {
            $module->removeProfesseur($this);
        }

        return $this;
    }
}
