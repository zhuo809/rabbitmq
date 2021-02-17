<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Message\OrderCreated;

class DefaultController extends AbstractController
{
    public function index(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new OrderCreated('12345'));
        
        return new Response(
            'OK'
        );
    }
}

?>