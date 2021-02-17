<?php
require __DIR__ . '/lib/connect.php';

$channel->queue_declare('work_queues', false, true, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
    sleep(substr_count($msg->body, '.'));
    echo " [x] Done\n";
};

/***
 * Consumer 1 seul message
 */
//$channel->basic_qos(null, 20, null);
/***
 * no_ack : true means no ack) and send a proper acknowledgment from the worker, once we're done with a task
 */

$channel->basic_consume('work_queues', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();

