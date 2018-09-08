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

        echo $twig->render('admin.twig', array(
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

    static function editIntrotext($description)
    {
        $updater = new Updater();

        $updater->setIntrotext($description);

        header('Location: index.php?action=homeadmin');
    }

    static function editSkill($id, $name, $level)
    {
        $updater = new Updater();

        $updater->setSkill($id, $name, $level);

        header('Location: index.php?action=homeadmin');
    }

    static function editExperience($id, $period, $location, $name, $description)
    {
        $updater = new Updater();

        $updater->setExperience($id, $period, $location, $name, $description);

        header('Location: index.php?action=homeadmin');
    }

    static function editExpertise($id, $picture, $title, $description)
    {
        $updater = new Updater();

        $updater->setExpertise($id, $picture, $title, $description);

        header('Location: index.php?action=homeadmin');
    }

    static function editContact($address, $mail, $phone)
    {
        $updater = new Updater();

        $updater->setContact($address, $mail, $phone);

        header('Location: index.php?action=homeadmin');
    }

    static function editLanguage($id, $language, $level)
    {
        $updater = new Updater();

        $updater->setLanguage($id, $language, $level);

        header('Location: index.php?action=homeadmin');
    }

    static function editWorks($id, $picture, $link, $category)
    {
        $updater = new Updater();

        $updater->setWorks($id, $link, $category);

        unlink('public/img/works/work_' . $id . '.png'); //remove the file

        if (move_uploaded_file($picture['tmp_name'], 'public/img/works/work_' . $id . '.png')) {
            echo 'all good';
        } else {
            echo 'meeeeh';
        }

        header('Location: index.php?action=homeadmin');
    }

    static function addWorks($picture, $link, $category)
    {
        $updater = new Updater();

        $lastinsert = $updater->insertWorks($link, $category);

        if (move_uploaded_file($picture['tmp_name'], 'public/img/works/work_' . $lastinsert . '.png')) {
            header('Location: index.php?action=homeadmin');
        } else {
            throw new Exception('Impossible d\'ajouter l\'article !');
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
            $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
        }

        if(count($errors) === 0) {
            move_uploaded_file($resume['tmp_name'], 'public/pdf/resume_sylvain_depardieu.pdf');
            header('Location: index.php?action=homeadmin');
        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }
        }
    }
}