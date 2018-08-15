<?php

namespace Portfolio\Controller;

require_once 'model/moduledisplay.php';

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
}