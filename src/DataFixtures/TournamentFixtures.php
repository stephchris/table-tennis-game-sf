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
        $corsaire->setDescription('Venez vous affronter, que le meilleur corsaire gagne');
        $corsaire->setPlayerNumber('12');
        $corsaire->setTableNumber('6');
        $corsaire->setImage('corsaire_boat.jpg');
        $manager->persist($corsaire);
        $this->addReference('tournament-corsaire', $corsaire);

        $pirate = new Tournament();
        $pirate->setName('Tournoi des Pirates');
        $pirate->setDateStart($today->modify('2023-06-15 20:00'));
        $pirate->setType('homme');
        $pirate->setDescription('Venez vous affronter, que le meilleur pirate gagne');
        $pirate->setPlayerNumber('12');
        $pirate->setTableNumber('6');
        $pirate->setImage('pirate.jpg');
        $manager->persist($pirate);
        $this->addReference('tournament-pirate', $pirate);





        $manager->flush();

    }

    public function getDependencies()
    {
        return [GameFixtures::class];
    }
}