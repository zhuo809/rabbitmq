<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'ubique', 'ubique','ubique');
$channel = $connection->channel();

/***
 * queue : nom de queue
 * passive :
*/
$channel->queue_declare('hello2', false, true, false, false);

$msg_body = 'Hello World! sent time : '.date("Y-m-d H:i:s");
$msg = new AMQPMessage($msg_body);
$channel->basic_publish($msg, '', 'hello2');

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();