<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 15/08/2018
 * Time: 10:51
 */

namespace Portfolio\Controller;

use Portfolio\Model\Updater;

include_once 'model/updater.php';

class AdminBoard
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

        require_once 'view/admin.php';
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

        $updater->insertWorks($link, $category);

        $lastinsert = $updater->getLastWorkId();
        echo $lastinsert;
        echo $picture['tmp_name'];
    }

    static function editResume($resume)
    {
        unlink('public/pdf/resume_sylvain_depardieu.pdf'); //remove the file

        if (move_uploaded_file($resume['tmp_name'], 'public/pdf/resume_sylvain_depardieu.pdf')) {
            echo 'all good';
        } else {
            echo 'meeeeh';
        }

        header('Location: index.php?action=homeadmin');
    }
}