<?php

// src/Message/OrderCreated.php
namespace App\Message;

class OrderCreated
{
    private $order_id;

    public function __construct(string $order_id)
    {
        $this->order_id = $order_id;
    }

    public function getOrderId(): string
    {
        return $this->order_id;
    }

}

?>