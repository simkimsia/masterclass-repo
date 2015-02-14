<?php
ini_set('display_errors', '1');

session_start();

$path = realpath(__DIR__ . '/..');
require_once $path . '/vendor/autoload.php';

$configuration = require $path . '/config/config.php';

require_once($path . '/src/FrontController/MasterController.php');
require_once($path . '/src/Model/Index.php');
require_once($path . '/src/Model/Comment.php');
require_once($path . '/src/Model/Story.php');
require_once($path . '/src/Model/User.php');

use \Masterclass\FrontController\MasterController;
use \Masterclass\Model\Index;
use \Masterclass\Model\Comment;
use \Masterclass\Model\Story;
use \Masterclass\Model\User;

$framework = new MasterController($configuration);
echo $framework->execute();