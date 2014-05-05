<?php
require 'config.php';

require 'libs/Database.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/App.php';

$app = new App();
$app->init();
?>