<?php
include_once('SessionController.php');
include_once('PersistenceController.php');
include_once('db/orm/QueryBuilder/UserTypes.php');

class AuthenticationController
{
    private $sessionController;
    private $persistenceController;
    public function __construct() {
        //$s = new PersistenceController();
        $this->sessionController = new \controllers\SessionController();
        $this->persistenceController = new PersistenceController();
        if (( isset($_SESSION['username']) && isset($_SESSION['password'])  )) {
                if(self::isValidUser())   self::setSessionType();
                else {
                    $this->sessionController->startGuestSession();
                     array_push($_SESSION['errors'], "Wrong credentials");
                }
        } else $this->sessionController->startGuestSession();
    }
    public function isValidUser($userType = null, $username = null, $password = null) {
        if(!($username or $password) && ($_SESSION['username'] or $_SESSION['password']) ) {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
        }
        if(( isset($username) && isset($password)  )) {
            if (empty($userType)) $userType = null;
            $user = $this->persistenceController->retrieveUser($username, $password);
            if (empty($userType)) {
                if (($user['username'] == $username && $user['password'] == $password)) return true;
                else return false;
            }
            else if (!empty($userType)) {
                if (($user['username']==$username && $user['password'] == $password && $userType == $user['userType'] )) return true;
                else return false;
            }
        } else return false;
    }
    private function setSessionType() {
        $user = $this->persistenceController->retrieveUser($_SESSION['username'], $_SESSION['password']);
        if($user['userType'] == \UserTypes::student()) $this->sessionController->startStudentSession();
        if($user['userType'] == \UserTypes::professor()) $this->sessionController->startProfessorSession();
        if($user['userType'] == \UserTypes::secretariat()) $this->sessionController->startSecretariatSession();
        if($user['userType'] == \UserTypes::administrator()) $this->sessionController->startAdministratorSession();
    }
    public function logout() {
        $this->sessionController->closeUserSession();
    }
    public function getUsersDepartmentId() {
        $user = $this->persistenceController->retrieveUser($_SESSION['username'], $_SESSION['password']);
        if(isset($_SESSION['userDepartmentId'])) unset($_SESSION['userDepartmentId']);
        $_SESSION['userDepartmentId'] = $user['departments_departmentId'];
        return $user['departments_departmentId'];
    }
    public function getUserId() {
        $user = $this->persistenceController->retrieveUser($_SESSION['username'], $_SESSION['password']);
        if(isset($_SESSION['userId'])) unset($_SESSION['userId']);
        $_SESSION['userId'] = $user['userId'];
        return $user['userId'];
    }
}