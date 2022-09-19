<?php

namespace App\Infrastructure\Share\DataFixtures;

use App\Infrastructure\User\Repository\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $userEntity = new User();

        $userEntity->setFirstName("Pepe");
        $userEntity->setLastName("Apellidos");
        $userEntity->setUsername("usuario@correo.es");
        $userEntity->setPassword("fgtYYYv5642l");
        $manager->persist($userEntity);

        $manager->flush();
    }
}
