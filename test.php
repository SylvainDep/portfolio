<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 05/09/2018
 * Time: 15:46
 */

require_once("vendor/autoload.php");

$loader = new \Twig_Loader_Filesystem(__DIR__);
$twig = new \Twig_Environment($loader);

echo $twig->render('demo.twig', ['name' => 'zhinyz']);