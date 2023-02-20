<?php

namespace App\DataFixtures;

use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TournamentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $today = new \DateTimeImmutable();

        $corsaire = new Tournament();
        $corsaire->setName('Tournoi des Corsaires');
        $corsaire->setDateStart($today->modify('+4 month +1 day'));
        $corsaire->setType('mixte');

        $corsaire->setPlayerNumber('12');
        $corsaire->setTableNumber('6');
        $corsaire->setImage('corsaire_boat.jpg');
        $manager->persist($corsaire);
        $this->addReference('tournament-corsaire', $corsaire);
        $manager->flush();

    }

    public function getDependencies()
    {
        return [GameFixtures::class];
    }
}