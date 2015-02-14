<?php
ini_set('display_errors', '1');

session_start();

$path = realpath(__DIR__ . '/..');
require_once $path . '/vendor/autoload.php';

$config = require $path . '/config/config.php';

$config['path'] = $path;

require_once($path . '/config/diconfig.php');
$framework = $di->newInstance('Masterclass\FrontController\MasterController');

// $framework = new \Masterclass\FrontController\MasterController($configuration);
echo $framework->execute();