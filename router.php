<?php

namespace App\config;

require_once 'vendor/autoload.php';

use Exception;
use Controller\AdminBoard;
use Controller\Auth;
use Controller\Home;

class Router
{
    public function start()
    {
        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'].'/view');
        $twig = new \Twig_Environment($loader);

        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        new Home();
                        break;
                    case 'homeadmin':
                        new AdminBoard();
                        break;
                    case 'editintrotext':
                        if (!empty($_POST['description'])) {
                            AdminBoard::editIntrotext($_POST['description']);
                        } else {
                            throw new Exception('Please fill an introduction text before saving');
                        }
                        break;
                    case 'editskill':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['name']) AND !empty($_POST['level'])) {
                            AdminBoard::editSkill($_GET['id'], $_POST['name'], $_POST['level']);
                        } else {
                            throw new Exception('Please fill all fields of one skill before saving');
                        }
                        break;
                    case 'editexperience':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['period']) AND !empty($_POST['location']) AND !empty($_POST['name']) AND !empty($_POST['description'])) {
                            AdminBoard::editExperience($_GET['id'], $_POST['period'], $_POST['location'], $_POST['name'], $_POST['description']);
                        } else {
                            throw new Exception('Please fill all fields of one experience before saving');
                        }
                        break;
                    case 'editexpertise':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['picture']) AND !empty($_POST['title']) AND !empty($_POST['description'])) {
                            AdminBoard::editExpertise($_GET['id'], $_POST['picture'], $_POST['title'], $_POST['description']);
                        } else {
                            throw new Exception('Please fill all fields of one expertise before saving');
                        }
                        break;
                    case 'editworks':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['link']) AND !empty($_POST['category'])) {
                            AdminBoard::editWorks($_GET['id'], $_FILES['picture'], $_POST['link'], $_POST['category']);
                        } else {
                            throw new Exception('Please fill all fields of one work before saving');
                        }
                        break;
                    case 'addwork':
                        if (!empty($_FILES['picture']) AND !empty($_POST['link']) AND !empty($_POST['category'])) {
                            AdminBoard::addWorks($_FILES['picture'], $_POST['link'], $_POST['category']);
                        } else {
                            throw new Exception('Please fill all fields for the work (including file) before saving');
                        }
                        break;
                    case 'editcontact':
                        if (!empty($_POST['address']) AND !empty($_POST['mail']) AND !empty($_POST['phone'])) {
                            AdminBoard::editContact($_POST['address'], $_POST['mail'], $_POST['phone']);
                        } else {
                            throw new Exception('Please fill all contact fields before saving');
                        }
                        break;
                    case 'editlanguage':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['language']) AND !empty($_POST['level'])) {
                            AdminBoard::editLanguage($_GET['id'], $_POST['language'], $_POST['level']);
                        } else {
                            throw new Exception('Please provide the language AND a level before saving');
                        }
                        break;
                    case 'editresume':
                        if (!empty($_FILES['resume'])) {
                            AdminBoard::editResume($_FILES['resume']);
                            echo $_FILES['resume']['size'];
                        } else {
                            throw new Exception('Please load a PDF file before saving');
                        }
                        break;
                    case 'checkpassword':
                        if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
                            Home::checkPassword($_POST['pseudo'], $_POST['password']);
                        } else {
                            throw new Exception('Please provide a username and a password');
                        }
                        break;
                    case 'logout':
                        Auth::logout();
                        break;
                    case 'passwordrecovery':
                        Home::recoverPassword();
                        break;
                    case 'contactmail':
                        if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['subject']) AND !empty($_POST['message'])) {
                            Home::sendMail($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
                        } else {
                            throw new Exception('Please fill all the fields before submitting');
                        }
                        break;
                    case 'removeworks':
                        if(!empty($_GET['id']) AND $_GET['id'] > 0 ) {
                            AdminBoard::removeWorks($_GET['id']);
                        } else {
                            throw new Exception('Work to delete unmatched');
                        }
                        break;
                    default:
                        new Home();
                }
            } else {
                new Home();
            }
        }
        catch(Exception $e) {
            $message =  $e->getMessage();

            if (!empty($_SESSION['auth'])) {
                echo $twig->render('message.twig', array(
                    'error' => $message,
                    'linkaddress' => '/index.php?action=homeadmin',
                    'linktext' =>  'Return to admin page'
                ));
            } else {
                echo $twig->render('message.twig', array(
                    'error' => $message,
                    'linkaddress' => '/index.php',
                    'linktext' =>  'Return to home page'
                ));
            }

        }
    }
}