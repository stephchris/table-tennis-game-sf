<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$tom = new User();
        //$tom->setFirstName('Tom');
        //$tom->setLastName('NICOLE');
        //$tom->setGender('Homme');
        //$tom->setBirthDate($this->DateTimeInterface('Y-m-d'));
        //$tom->setAddress('29 rue d\'Oran');
        //$tom->setZipcode('35400');
        //$tom->setCity('SAINT-MALO');
        //$tom->setEmail('tom3cr.4@gmail.com');
        //$tom->setPassword($this->hasher->hashPassword($tom, 'tomy'));
        //$tom->setRoles(['ROLE_USER']);
        //$manager->persist($tom);
        //$this->addReference('tom-nicole', $tom);




        $manager->flush();
    }




}
