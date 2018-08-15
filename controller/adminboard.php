<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 15/08/2018
 * Time: 10:51
 */

namespace Portfolio\Controller;


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
}