<?php

namespace Controller;

require_once 'model/moduledisplay.php';
require_once 'model/AdminManager.php';

use Portfolio\Model\AdminManager;

class Home
{
    public function __construct()
    {
        $moduledisplay = new \Portfolio\Model\ModuleDisplay;
        $introtext = $moduledisplay->getIntroText();
        $skill = $moduledisplay->getSkillData();
        $experience = $moduledisplay->getExperience();
        $education = $moduledisplay->getEducation();
        $expertise = $moduledisplay->getExpertise();
        $works = $moduledisplay->getWorks();
        $contact = $moduledisplay->getContact();
        $languages = $moduledisplay->getLanguages();

        require_once 'view/template.php';
    }

    static function checkPassword($userId, $userPassword)
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        $isPasswordCorrect = password_verify($userPassword, $resultat['password']);

        $isIdCorrect = $userId == $resultat['admin'];

        if (!$resultat) {
            echo 'Le service est temporairement indisponible, veuillez réessayer plus tard';
        } else {
            if ($isPasswordCorrect AND $isIdCorrect) {
                Auth::auth();
                header('Location: index.php?action=homeadmin');
            } else {
                echo 'Mauvais identifiant ou mot de passe ! 
                <a href="index.php">Revenir à l\'accueil</a>';
            }
        }
    }

    static function recoverPassword()
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        mail($resultat['mail'], 'Récupération de mot de passe' , 'Le mot de passe pour accéder au site est Solange78');

        header('Location: index.php');
    }

    static function sendMail($name, $email, $subject, $message)
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        mail(
            $resultat['mail'],
            $subject,
            'From:' . $email . '<br/>
                       Message:' . $message . '<br/>
                       Signature:' . $name
        );

        header('Location: index.php');
    }
}