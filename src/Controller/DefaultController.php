<?php

namespace MyApp\Controller;

use MyApp\Message\SmsNotification;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new SmsNotification("a message"));

        return new JsonResponse([
            'message' => 'There are no jobs in the database',
        ]);
    }
}
