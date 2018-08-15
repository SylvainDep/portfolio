<?php

namespace App\config;

use Exception;

class Router
{
    public function start()
    {
        include_once 'controller/home.php';
        include_once 'controller/adminboard.php';

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'home') {
                    new \Portfolio\Controller\Home();
                } elseif ($_GET['action'] == 'homeadmin') {

                    new \Portfolio\Controller\AdminBoard();
                } else {
                    new \Portfolio\Controller\Home();
                }
            } else {
                new \Portfolio\Controller\Home();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}