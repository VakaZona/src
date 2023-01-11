<?php

namespace App\EventSubscriber;

use App\Repository\GameRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $gameRepository;

    public function __construct(Environment $twig, GameRepository $gameRepository){
        $this->twig = $twig;
        $this->gameRepository = $gameRepository;
    }
    public function onControllerEvent(ControllerEvent $event): void
    {
        // ...
        $this->twig->addGlobal('games', $this->gameRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
