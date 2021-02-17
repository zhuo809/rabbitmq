<?php

// src/Handler/OrderCreatedHandler.php
namespace App\Handler;

use App\Message\OrderCreated;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class OrderCreatedHandler implements MessageHandlerInterface
{
    public function __invoke(OrderCreated $orderCreated)
    {
        shell_exec('touch /app/lol');

        // file_put_contents('/app/test.txt', '$orderCreated->getOrderId()');
    }
}

?>