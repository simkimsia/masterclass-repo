<?php
ini_set('display_errors', '1');

session_start();

$path = realpath(__DIR__ . '/..');
require_once $path . '/vendor/autoload.php';

$configuration = require $path . '/config/config.php';

$configuration['path'] = $path;

$framework = new \Masterclass\FrontController\MasterController($configuration);
echo $framework->execute();