<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $game1 = new Game();

        $game1->setRoundNumber(1);
        $game1->setTableNumber(1);
        $game1->setScorePlayerOne(1);
        $game1->setScorePlayerTwo(0);
        $game1->setPlayerOne($this->getReference('tom-nicole'));
        $game1->setPlayerTwo($this->getReference('esteban-nicole'));

        $manager->persist($game1);
        $this->addReference('match 1', $game1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
