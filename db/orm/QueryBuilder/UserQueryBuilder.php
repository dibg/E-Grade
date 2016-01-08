<?php
include_once'db/connection/DBSettings.php';

class UserQueryBuilder {
    private $dbName;
    public function __construct() {
        $db = new DBSettings();
        $dbSettings = $db->getDbSettings();
        $this->dbName = $dbSettings->dbName;
    }
    public function createSecretariat($username, $password, $departmentId) {
        return ("INSERT INTO $this->dbName.user (username, password, usertype, departments_departmentId) VALUES ('$username', '$password'," . "'". UserTypes::secretariat() . "'". ", '$departmentId')");
    }

    public function createStudent ($user, $password) {
        return ("INSERT INTO $this->dbName.user (username, password, usertype) VALUES ('$user', '$password'," . "'". UserTypes::student() . "'". ")");
    }

     public function createProfessor ($user, $password) {
         return ("INSERT INTO $this->dbName.user  (username, password, usertype) VALUES ('$user', '$password'," . "'". UserTypes::professor() . "'". ")");
    }

    public function createAdministrator ($user, $password) {
        return ("INSERT INTO $this->dbName.user (username, password, usertype) VALUES ('$user', '$password'," . "'". UserTypes::administrator() . "'". ")");
    }
 
    public function selectAllUsers() {
        return("select * from  $this->dbName.users");
    }

    public function login($username, $password)
    {
        return("SELECT * from $this->dbName.user  where username like '$username' AND password like '$password' ");
    }


}