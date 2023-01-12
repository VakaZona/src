<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Comment;
use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private PasswordHasherFactoryInterface $passwordHasherFactory,
    ){
    }

    public function load(ObjectManager $manager): void
    {
        $factorio = new Game();
        $factorio->setName('Factorio 2');
        $factorio->setReleased('2009');
        $factorio->setIsHacked(true);
        $manager->persist($factorio);

        $battlefield = new Game();
        $battlefield->setName('Battlefield 3');
        $battlefield->setReleased('2014');
        $battlefield->setIsHacked(true);
        $manager->persist($battlefield);

        $comment = new Comment();
        $comment->setGame($factorio);
        $comment->setAuthor('Valery');
        $comment->setEmail('balery@mail.com');
        $comment->setText('Cool');
        $manager->persist($comment);

        $admin = new Admin();
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordHasherFactory->getPasswordHasher(Admin::class)->hash('admin'));
        $manager->persist($admin);

        $manager->flush();
    }
}
