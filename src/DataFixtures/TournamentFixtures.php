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

        $tournament1 = new Tournament();
        $tournament1->setName($this->getReference('Tournoi des Corsaires'));
        $tournament1->setDateStart($today->modify('+4 month +1 day'));
        $tournament1->setDateEnd('');
        $tournament1->setDescription('Venez vous affronter, que le meilleur corsaire gagne');
        $tournament1->setPlayerNumber('12');
        $tournament1->setTableNumber('6');
        $tournament1->setImage('corsaire_boat.jpg');
        $manager->persist($tournament1);
        $this->addReference('tournament-corsaire', $tournament1);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [GameFixtures::class];
    }
}
