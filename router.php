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
                            throw new Exception('Please put an introduction text<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editskill':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['name']) AND !empty($_POST['level'])) {
                            AdminBoard::editSkill($_GET['id'], $_POST['name'], $_POST['level']);
                        } else {
                            throw new Exception('Please fill all fields of one skill before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editexperience':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['period']) AND !empty($_POST['location']) AND !empty($_POST['name']) AND !empty($_POST['description'])) {
                            AdminBoard::editExperience($_GET['id'], $_POST['period'], $_POST['location'], $_POST['name'], $_POST['description']);
                        } else {
                            throw new Exception('Please fill all fields of one experience before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editexpertise':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['picture']) AND !empty($_POST['title']) AND !empty($_POST['description'])) {
                            AdminBoard::editExpertise($_GET['id'], $_POST['picture'], $_POST['title'], $_POST['description']);
                        } else {
                            throw new Exception('Please fill all fields of one expertise before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editworks':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_FILES['picture']) AND !empty($_POST['link']) AND !empty($_POST['category'])) {
                            AdminBoard::editWorks($_GET['id'], $_FILES['picture'], $_POST['link'], $_POST['category']);
                        } else {
                            throw new Exception('Please fill all fields for the work (including file) before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'addwork':
                        if (!empty($_FILES['picture']) AND !empty($_POST['link']) AND !empty($_POST['category'])) {
                            AdminBoard::addWorks($_FILES['picture'], $_POST['link'], $_POST['category']);
                        } else {
                            throw new Exception('Please fill all fields for the work (including file) before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editcontact':
                        if (!empty($_POST['address']) AND !empty($_POST['mail']) AND !empty($_POST['phone'])) {
                            AdminBoard::editContact($_POST['address'], $_POST['mail'], $_POST['phone']);
                        } else {
                            throw new Exception('Please fill all contact fields before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editlanguage':
                        if (!empty($_GET['id']) AND $_GET['id'] > 0 AND !empty($_POST['language']) AND !empty($_POST['level'])) {
                            AdminBoard::editLanguage($_GET['id'], $_POST['language'], $_POST['level']);
                        } else {
                            echo $_GET['id'] . $_POST['language'] . $_POST['level'];
                            throw new Exception('Please provide the language AND a level before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'editresume':
                        if (!empty($_FILES['resume'])) {
                            AdminBoard::editResume($_FILES['resume']);
                            echo $_FILES['resume']['size'];
                        } else {
                            throw new Exception('Please load a PDF file before saving<br/><a href="javascript:history.back()">Return to dashboard</a>');
                        }
                        break;
                    case 'checkpassword':
                        if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
                            Home::checkPassword($_POST['pseudo'], $_POST['password']);
                        } else {
                            throw new Exception('Please provide a username and a password<br/><a href="javascript:history.back()">Return to homepage</a>');
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
                            throw new Exception('Please fill all the fields before submiting<br/><a href="javascript:history.back()">Return to homepage</a>');
                        }
                        break;
                    case 'removeworks':
                        if(!empty($_GET['id']) AND $_GET['id'] > 0 ) {
                            AdminBoard::removeWorks($_GET['id']);
                        } else {
                            throw new Exception('Work to delete unmatched<br/><a href="javascript:history.back()">Return to admin page</a>');
                        }
                    default:
                        new Home();
                }
            } else {
                new Home();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}