<?php
require __DIR__ . '/lib/connect.php';

use PhpAmqpLib\Message\AMQPMessage;

$msg_body = implode(' ', array_slice($argv, 1));
if (empty($msg_body)) {
    $msg_body = "info: Hello World!";
}
$msg = new AMQPMessage($msg_body);

$channel->basic_publish($msg, 'logs', 'exchange');

echo ' [x] Sent ', $msg_body, "\n";

$channel->close();
$connection->close();