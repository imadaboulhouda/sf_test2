<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hashCode;
    function __construct(UserPasswordHasherInterface $hash)
    {
        $this->hashCode = $hash;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("imad@gmail.com");
        $password = "123456";
        $passwordHash = $this->hashCode->hashPassword($user,$password);
        $user->setPassword($passwordHash);
        $user->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);
        $manager->flush();
    }
}
