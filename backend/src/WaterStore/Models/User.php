<?php
namespace WaterStore\Models;

use WaterStore\Models\Entity;

/**
 * @Entity
 * @Table(name="user")
 */
class User extends Entity {

    /**
     * @var integer @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string @Column(type="string", length=255)
     */
    private $username;
    
    /**
     *
     * @var string @Column(type="string", length=255)
     */
    private $password;
    
    /**
     *
     * @var string @Column(type="string", length=255)
     */
    private $address;

    public function __construct($id = 0,$username= "" ,$password= "" ,$address= "" ){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->address = $address;
    }
    
    public static function construct($array){

        $user = new User();
        $user->setId( $array['id']);
        $user->setUsername( $array['username']);
        $user->setPassword( $array['password']);
        $user->setAddress( $array['address']);
        return $user;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username){
        $this->username=$username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password){
        $this->password=$password;
    }
    
    public function getAddress(){
        return $this->address;
    }
    
    public function setAddress($address){
        $this->address=$address;
    }

    public function equals($object){
        if($object instanceof User){
        
            if($this->id!=$object->id){
                return false;
            }
        
            if($this->username!=$object->username){
                return false;
            }
        
            if($this->password!=$object->password){
                return false;    
            }
        
            if($this->address!=$object->address){
                return false;
            }
    
            return true;
    
        } else{
            return false;
        }
    
    }

    public function toString(){
    
        return "  [id:" .$this->id. "]  [username:" .$this->username. "]  [password:" .$this->password. "]  [address:" .$this->address. "]  " ;
    }
    
    public function toArray(){
        return [
            "id"       => $this->id,
            "username" => $this->username,
            "address"  => $this->address
        ];
    }
}
?>