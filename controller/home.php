<?php

namespace Controller;

require 'vendor/autoload.php';

use Model\AdminManager;
use Model\ModuleDisplay;

class Home
{

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/view');
        $twig = new \Twig_Environment($loader);

        $moduledisplay = new ModuleDisplay();
        $introtext = $moduledisplay->getIntroText();
        $skill = $moduledisplay->getSkillData();
        $experience = $moduledisplay->getExperience();
        $education = $moduledisplay->getEducation();
        $expertise = $moduledisplay->getExpertise();
        $works = $moduledisplay->getWorks();
        $works_style = $moduledisplay->getWorks();
        $contact = $moduledisplay->getContact();
        $languages = $moduledisplay->getLanguages();
        $origin = '';

        if (!empty($_GET['origin'])) {
            $origin = $_GET['origin'];
        }

        echo $twig->render('home.twig', array(
            'introtext' => $introtext,
            'skill' => $skill,
            'education' => $education,
            'experience' => $experience,
            'expertise' => $expertise,
            'works' => $works,
            'works_style' => $works_style,
            'contact' => $contact,
            'language' => $languages,
            'origin' => $origin
        ));
    }


    static function checkPassword($userId, $userPassword)
    {
        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/view');
        $twig = new \Twig_Environment($loader);
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
                echo $twig->render('message.twig', array(
                    'error' => 'Wrong ID or password',
                    'linkaddress' => '/',
                    'linktext' =>  'Go back to homepage'
                ));
            }
        }
    }

    static function recoverPassword()
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        mail($resultat['mail'], 'Récupération de mot de passe' , 'Le mot de passe pour accéder au site est Beynes78');

        header('Location: index.php');
    }

    static function sendMail($name, $email, $subject, $message)
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        mail(
            $resultat['mail'],
            $subject,
            'From:' . $email . ' \n
                       Message:' . $message . ' \n
                       Signature:' . $name
        );

        header('Location: index.php?origin=sentemail');
    }
}