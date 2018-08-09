<?php
/**
 * Beanstalkd publisher
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

$job = array(
    'action' => 'comment_add',
    'data' => array('comment_id' => 1),
);

$QUEUE_TUBE = getenv('QUEUE_TUBE');
$queue
    ->useTube($QUEUE_TUBE)
    ->put(json_encode($job))
;