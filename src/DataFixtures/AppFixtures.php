<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {}

    public function load(ObjectManager $manager): void
    {
        $admin = new User;
        $admin->setEmail('admin@gmail.com');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'password'));
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $manager->persist($admin);

        for ($i = 1; $i <= 10; $i++){
            $user = new User;
            $user->setEmail('user' . $i . '@gmail.com');
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'password'));
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
