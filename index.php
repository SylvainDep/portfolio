<?php

require 'debug.php';
require 'router.php';

$router = new \App\config\Router();
$router->start();