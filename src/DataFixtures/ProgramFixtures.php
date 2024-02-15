<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $program = new Program();
        $program->setTitle('Walking dead');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Les chevaliers du ciel');
        $program->setSynopsis("Les aventures des pilotes de l'armée de l'air Tanguy et Laverdure");
        $program->setCategory($this->getReference('category_Aventure'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Muscleman');
        $program->setSynopsis("Les aventures d'un extraterrestre qui s'est écrasé sur Terre qui devient champion de catch et dont sa force se décuple quand il mange de l'ail.");
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Code Quantum');
        $program->setSynopsis("En 1995, le docteur Samuel Beckett dit « Sam », scientifique de génie, a émis l'hypothèse qu'il était possible de voyager dans le temps au cours de sa propre vie. Voulant prouver que sa théorie est juste, il tente l'expérience sur lui-même en entrant dans l'accélérateur temporel. Mais cela tourne mal. Désormais, Sam saute d'une époque à une autre, au cours de la seconde moitié du xxe siècle aux États-Unis.Convaincu que son périple n'est pas dû au hasard, mais que Dieu ou une force inconnue décide de ses sauts spatio-temporels, Sam Beckett essaie de réparer les erreurs du passé, intervenant dans la vie d'individus dont il occupe les corps (hommes, femmes, parfois animaux). Espérant à chaque fois, que son prochain saut le ramènera à sa propre époque.");
        $program->setCategory($this->getReference('category_Fantastique'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('American Horror Story');
        $program->setSynopsis("La série fait référence à de nombreux faits divers, personnages historiques, films (notamment les classiques du fantastique et de l'horreur), légendes urbaines, histoires paranormales et mystérieuses — mêlant la peur, le déséquilibre psychologique, le gore, le sexe, les tabous de la société et le politiquement correct.");
        $program->setCategory($this->getReference('category_Horreur'));
        $manager->persist($program);

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}