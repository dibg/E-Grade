<?php
class UserQueryBuilder {
    private $dBName;
    public function __construct() {
        $db = new DBSettings();
        $dbSettings = $db->getDbSettings();
        $this->dBName= $dbSettings->dBName;
    }
    public function createSecretariat($id, $user, $password, $usertype) {
        echo $this->dBName;
     return ("INSERT INTO `$this->dBName`.`users` (`id`, `username`, `password`, `usertype`) VALUES ($id, '$user', '$password', '$usertype')");
 }
    public function showusers() {
        return("select * from users");
    }
}