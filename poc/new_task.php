<?php
require __DIR__ . '/lib/connect.php';

use PhpAmqpLib\Message\AMQPMessage;

/***
 * queue : nom de queue
 * passive :
*/
$channel->queue_declare('work_queues', false, true, false, false);


$msg_body = implode(' ', array_slice($argv, 1));
if (empty($msg_body)) {
    $msg_body = "Hello World!";
}//end if

$msg = new AMQPMessage($msg_body);
echo " [x] Sent '".$msg_body."'\n";

$channel->basic_publish($msg, '', 'work_queues');

/*for ($i = 1; $i <= 30; $i++) {
    $msg_body = $i.".Message envoyé en mode work queues.";
    $msg = new AMQPMessage(
        $msg_body,
        array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
    );

    $channel->basic_publish($msg, '', 'work_queues');

    echo " [x] Sent '".$msg_body."'\n";
}*/

$channel->close();
$connection->close();