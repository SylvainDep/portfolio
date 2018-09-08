<?php

namespace Controller;

require 'vendor/autoload.php';

use Model\AdminManager;
use Model\ModuleDisplay;

class Home
{

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'].'/view');
        $twig = new \Twig_Environment($loader);

        $moduledisplay = new ModuleDisplay;
        $introtext = $moduledisplay->getIntroText();
        $skill = $moduledisplay->getSkillData();
        $experience = $moduledisplay->getExperience();
        $education = $moduledisplay->getEducation();
        $expertise = $moduledisplay->getExpertise();
        $works = $moduledisplay->getWorks();
        $works_style = $moduledisplay->getWorks();
        $contact = $moduledisplay->getContact();
        $languages = $moduledisplay->getLanguages();

        echo $twig->render('demo.twig', array(
            'introtext' => $introtext,
            'skill' => $skill,
            'education' => $education,
            'experience' => $experience,
            'expertise' => $expertise,
            'works' => $works,
            'works_style' => $works_style,
            'contact' => $contact,
            'language' => $languages
        ));
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