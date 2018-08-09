<?php
/**
 * Worker beantstalkd
 */

require __DIR__ . '/../vendor/autoload.php';

use Pheanstalk\Pheanstalk;
use Symfony\Component\Dotenv\Dotenv;

$DOTENV_PATH = __DIR__ . '/../.env';
if (file_exists($DOTENV_PATH)) {
    $dotenv = new Dotenv();
    $dotenv->load($DOTENV_PATH);
}

$QUEUE_DSN = getenv('QUEUE_DSN');
$queue = new Pheanstalk($QUEUE_DSN);

$QUEUE_TUBE = getenv('QUEUE_TUBE');
$queue->watch($QUEUE_TUBE);

while ($job = $queue->reserve()) {
    $received = json_decode($job->getData(), true);
    $action = $received['action'];
    
    $data = isset($received['data'])
        ? $received['data']
        : array();
    
    echo 'Received a ' . $action . '(' . current($data) . ")\n";
    sleep(1);
    $queue->delete($job);
}
