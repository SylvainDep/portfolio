<?php

namespace Model;

require_once("manager.php");

class AdminManager extends Manager
{
    public function getCredentials()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM admin WHERE id = 1');
        $resultat = $req->fetch();

        return $resultat;
    }

    public function getAdminEmail()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT email, password FROM admin');
        $resultat = $req->fetch();

        return $resultat;
    }
}