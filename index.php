<?php

require 'vendor/autoload.php';

use Endroid\Twitter\Twitter;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$dotenv->required([
    'CONSUMER_KEY',
    'CONSUMER_SECRET'
]);

$twitter = new Twitter(
    getenv('CONSUMER_KEY'),
    getenv('CONSUMER_SECRET'),
    getenv('ACCESS_TOKEN'),
    getenv('ACCESS_TOKEN_SECRET')
);

$tweets = $twitter->getTimeline([
    'count' => 2
]);

file_put_contents('tweets.json', json_encode($tweets));
