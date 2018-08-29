<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 24/08/2018
 * Time: 09:53
 */

namespace Portfolio\Model;


class Updater extends Manager
{
    public function setIntrotext($description)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE intro_text SET description = :newdescription WHERE id = 1');
        $updateddata = $req->execute(array(
            'newdescription' => $description
        ));

        return $updateddata;
    }

    public function setSkill($id, $name, $level)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE skill SET skill_name = :skill_name, skill_level = :skill_level WHERE id = :id');
        $updateddata = $req->execute(array(
            'id' => $id,
            'skill_name' => $name,
            'skill_level' => $level
        ));

        return $updateddata;
    }

    public function setExperience($id, $period, $location, $name, $description)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE experiences SET period = :period, location = :location, title = :title, description = :description WHERE id = :id');
        $updateddata = $req->execute(array(
            'id' => $id,
            'period' => $period,
            'location' => $location,
            'title' => $name,
            'description' => $description
        ));

        return $updateddata;
    }

    public function setExpertise($id, $picture, $title, $description)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE expertise SET picture = :picture, title = :title, description = :description WHERE id = :id');
        $updateddata = $req->execute(array(
            'id' => $id,
            'picture' => $picture,
            'title' => $title,
            'description' => $description
        ));

        return $updateddata;
    }


    public function setContact($address, $mail, $phone)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE contact SET address = :address, mail = :mail, phone = :phone WHERE id = 1');
        $updateddata = $req->execute(array(
            'address' => $address,
            'mail' => $mail,
            'phone' => $phone
        ));

        return $updateddata;
    }

    public function setLanguage($id, $language, $level)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE languages SET languages = :languages, language_level = :language_level WHERE id = :id');
        $updateddata = $req->execute(array(
            'id' => $id,
            'languages' => $language,
            'language_level' => $level
        ));

        return $updateddata;
    }

    public function setWorks($id, $link, $category)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE works SET link = :link, category = :category WHERE id = :id');
        $updateddata = $req->execute(array(
            'id' => $id,
            'link' => $link,
            'category' => $category
        ));

        return $updateddata;
    }

    public function insertWorks($link, $category)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO works(link, category) VALUES(:link, :category)');
        $addeddata = $req->execute(array(
            'link' => $link,
            'category' => $category
        ));

        return $addeddata;
    }
}