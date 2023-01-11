<?php

namespace App\EntityListener;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, entity: Game::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Game::class)]
class GameEntityListener
{
    public function __construct(
        private SluggerInterface $slugger
    ) {

    }

    public function prePersist(Game $game, LifecycleEventArgs $event)
    {
        $game->computeSlug($this->slugger);
    }

    public function preUpdate(Game $game, LifecycleEventArgs $event)
    {
        $game->computeSlug($this->slugger);
    }
}