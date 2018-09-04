<?php

namespace App\config;

use Exception;
use Portfolio\Controller\AdminBoard;
use Portfolio\Controller\Auth;
use Portfolio\Controller\Home;

class Router
{
    public function start()
    {
        include_once 'controller/home.php';
        include_once 'controller/adminboard.php';
        include_once 'controller/Auth.php';

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
                        AdminBoard::editIntrotext($_POST['description']);
                        break;
                    case 'editskill':
                        AdminBoard::editSkill($_GET['id'], $_POST['name'], $_POST['level']);
                        break;
                    case 'editexperience':
                        AdminBoard::editExperience($_GET['id'], $_POST['period'], $_POST['location'], $_POST['name'], $_POST['description']);
                        break;
                    case 'editexpertise':
                        AdminBoard::editExpertise($_GET['id'], $_POST['picture'], $_POST['title'], $_POST['description']);
                        break;
                    case 'editworks':
                        AdminBoard::editWorks($_GET['id'], $_FILES['picture'], $_POST['link'], $_POST['category']);
                        break;
                    case 'addworks':
                        AdminBoard::addWorks($_FILES['picture'], $_POST['link'], $_POST['category']);
                        break;
                    case 'editcontact':
                        AdminBoard::editContact($_POST['address'], $_POST['mail'], $_POST['phone']);
                        break;
                    case 'editlanguage':
                        AdminBoard::editLanguage($_GET['id'], $_POST['language'], $_POST['level']);
                        break;
                    case 'edit_resume':
                        AdminBoard::editResume($_FILES['resume']);
                        break;
                    case 'checkpassword':
                        Home::checkPassword($_POST['pseudo'], $_POST['password']);
                        break;
                    case 'logout':
                        Auth::logout();
                        break;
                    case 'passwordrecovery':
                        Home::recoverPassword();
                        break;
                    case 'contactmail':
                        Home::sendMail($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
                        break;
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