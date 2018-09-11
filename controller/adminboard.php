<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 15/08/2018
 * Time: 10:51
 */

namespace Controller;

require_once 'vendor/autoload.php';

use Model\ModuleDisplay;
use Model\Updater;
use Exception;

class AdminBoard
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
        $origin = '';

        if (!empty($_GET['origin'])) {
            $origin = $_GET['origin'];
        }

        echo $twig->render('admin.twig', array(
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


    static function editIntrotext($description)
    {
        if(Auth::isAuth()) {
        $updater = new Updater();

        $updater->setIntrotext($description);

        header('Location: index.php?action=homeadmin&origin=editedintrotext');
        }  else {
            Auth::logout();
        }

    }

    static function editSkill($id, $name, $level)
    {
        $updater = new Updater();

        $updater->setSkill($id, $name, $level);

        header('Location: index.php?action=homeadmin&origin=editedskill');
    }

    static function editExperience($id, $period, $location, $name, $description)
    {
        $updater = new Updater();

        $updater->setExperience($id, $period, $location, $name, $description);

        header('Location: index.php?action=homeadmin&origin=editedexperience');
    }

    static function editExpertise($id, $picture, $title, $description)
    {
        $updater = new Updater();

        $updater->setExpertise($id, $picture, $title, $description);

        header('Location: index.php?action=homeadmin&origin=editedexpertise');
    }

    static function editContact($address, $mail, $phone)
    {
        $updater = new Updater();

        $updater->setContact($address, $mail, $phone);

        header('Location: index.php?action=homeadmin&origin=editedcontact');
    }

    static function editLanguage($id, $language, $level)
    {
        $updater = new Updater();

        $updater->setLanguage($id, $language, $level);

        header('Location: index.php?action=homeadmin&origin=editedlanguage');
    }

    static function removeWorks($id)
    {
        $updater = new Updater();

        $updater->deleteWorks($id);

        header('Location: index.php?action=homeadmin&origin=removedwork');
    }

    static function editWorks($id, $picture, $link, $category)
    {
        $updater = new Updater();

        $updater->setWorks($id, $link, $category);

        $errors     = array();
        $maxsize    = 2097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif'
        );

        if(($picture['size'] >= $maxsize) || ($picture["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 2 megabytes.';
        }

        if(!in_array($picture['type'], $acceptable) && !empty($picture['type'])) {
            $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
        }

        if(count($errors) === 0) {
            move_uploaded_file($picture['tmp_name'], 'public/img/works/work_' . $id . '.png');
            header('Location: index.php?action=homeadmin&origin=editedwork');
        } else {
            foreach($errors as $error) {
                echo $error;
            }
        }
    }

    static function addWorks($picture, $link, $category)
    {
        $updater = new Updater();

        $lastinsert = $updater->insertWorks($link, $category);

        $errors     = array();
        $maxsize    = 2097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif'
        );

        if(($picture['size'] >= $maxsize) || ($picture["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 2 megabytes.';
        }

        if(!in_array($picture['type'], $acceptable) && !empty($picture['type'])) {
            $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
        }

        if(count($errors) === 0) {
            move_uploaded_file($picture['tmp_name'], 'public/img/works/work_' . $lastinsert . '.png');
            header('Location: index.php?action=homeadmin&origin=addedwork');
        } else {
            foreach($errors as $error) {
                echo $error;
            }
        }
    }

    static function editResume($resume)
    {
        $errors     = array();
        $maxsize    = 2097152;
        $acceptable = array(
            'application/pdf'
        );

        if(($resume['size'] >= $maxsize) || ($resume["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 2 megabytes.';
        }

        if(!in_array($resume['type'], $acceptable) && !empty($resume['type'])) {
            $errors[] = 'Invalid file type. Only PDF type is accepted.';
        }

        if(count($errors) === 0) {
            move_uploaded_file($resume['tmp_name'], 'public/pdf/resume_sylvain_depardieu.pdf');
            header('Location: index.php?action=homeadmin&origin=editedresume');
        } else {
            foreach($errors as $error) {
                echo $error;
            }
        }
    }
}