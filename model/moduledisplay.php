<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 26/07/2018
 * Time: 15:50
 */

namespace Model;

require_once("manager.php");

class ModuleDisplay extends Manager
{
    public function getIntroText()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM intro_text');
        $req->execute(array());
        $introtext = $req->fetch();

        return $introtext;
    }

    public function getSkillData()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM skill');

        return $req;
    }

    public function getExperience()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM experiences WHERE topic = \'experience\'');

        return $req;
    }

    public function getEducation()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM experiences WHERE topic = \'education\'');

        return $req;
    }

    public function getExpertise()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM expertise');

        return $req;
    }

    public function getWorks()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM works');

        return $req;
    }

    public function getContact()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM contact');
        $req->execute(array());
        $contact = $req->fetch();

        return $contact;
    }

    public function getLanguages()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM languages');

        return $req;
    }
}