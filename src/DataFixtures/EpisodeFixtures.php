<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $episode = new Episode();
        $episode->setNumber(1);
        $episode->setTitle("Le coiffeur");
        $episode->setSynopsis('Pierre Paul et Jacques décident après avoir assités à un concert de reggae, d\'aller chez le coiffeur. Ils ne s\'attendaient pas à une telle rencontre.  ');
        $episode->setSeason($this->getReference('season1_walking_dread'));
        $manager->persist($episode);
        $this->addReference('episode1_walking_dread', $episode);

        $episode = new Episode();
        $episode->setNumber(2);
        $episode->setTitle("La Pièce secrète");
        $episode->setSynopsis('Pierre Paul et Jacques découvrent une étrange porte, cacher derrière le lavabo.');
        $episode->setSeason($this->getReference('season1_walking_dread'));
        $manager->persist($episode);
        $this->addReference('episode2_walking_dread', $episode);

        $episode = new Episode();
        $episode->setNumber(3);
        $episode->setTitle("L'horreur commence");
        $episode->setSynopsis("Alors qu'ils retrouvent enfermé dans l'étrange salle Pierre Paul et Jacques commence à perdre leurs Dreadlocks.");
        $episode->setSeason($this->getReference('season1_walking_dread'));
        $manager->persist($episode);
        $this->addReference('episode3_walking_dread', $episode);

        $manager->flush();


    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont SeasonFixtures dépend
        
        return[
            SeasonFixtures::class,
        ];
    }
}
