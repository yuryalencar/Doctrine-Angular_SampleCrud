<?php
namespace WaterStore\Controllers;

use WaterStore\Models\User;
use WaterStore\DAOs\UserDAO;

class UserController {

    private $dao;

    public function __construct() {
        $this->setDao(new UserDAO());
    }

    public function getDao(){
        return $this->dao;
    }

    public function setDao(UserDAO $userDao){
        $this->dao = $userDao;
    }

    public function get($userId){
        
        if($this->userExists($userId)){
            $user = $this->getDao()->findById($userId);

            $data = $user == null ? [] : $user->toArray();
        } else {
            $data = array();
            $resultSearch = $this->getDao()->findAll();
            
            foreach ($resultSearch as $user) {
                $data[] = $user->toArray();
            }
        }

        return $data;
    }

    public function insert($userJson){
        $userToSave = new User($userJson->id, $userJson->username, $userJson->password, $userJson->address);
        $this->getDao()->insert($userToSave);
        return ["message" => "User Added Successfully"];
    }

    public function update($userId, $userJson){
        $userToUpdate = new User($userId, $userJson->username, $userJson->password, $userJson->address);
        $this->getDao()->update($userToUpdate);
        return ["message" => "User Updated Successfully"];
    }

    public function delete($userId){
        if($this->userExists($userId)){
            $userToDelete = $this->getDao()->findById($userId);
            $this->getDao()->delete($userToDelete);
            return ["message" => "User Removed Successfully"];    
        }
        return ["message" => "User Not Found :("];    
    }

    private function userExists($userId){
        if($userId == null){
            return false;
        }
        $userExists = $this->getDao()->findById($userId);
        return $userExists != null;
    }
}

?>