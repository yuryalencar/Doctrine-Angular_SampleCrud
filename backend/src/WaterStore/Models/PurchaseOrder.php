<?php
namespace WaterStore\Models;

/**
 * @Entity
 * @Table(name="purchase_order")
 */
class PurchaseOrder{

    /**
     * @var integer @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    private $hour;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName = "id")
     */
    private $user;

    /**
     * @OneToMany(targetEntity="Item", mappedBy="purchase_order", cascade={"persist", "remove"})
     */
    private $items;
    
    public function __construct($id = 0,$hour= "0000-00-00 00:00:00" ,$user = 0,$items= array()){
        $this->id = $id;
        $this->hour = $hour;
        $this->user = $user;
        $this->items = $items;
    }
    
    public static function construct($array){
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->setId( $array['id']);
        $purchaseOrder->setHour( $array['hour']);
        $purchaseOrder->setUser( $array['user']);
        $purchaseOrder->setItems( $array['items']);
        return $purchaseOrder;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getHour(){
        return $this->hour;
    }
    
    public function setHour($hour){
        $this->hour=$hour;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function setUser($user){
        $this->user=$user;
    }
    
    public function getItems(){
        return $this->items;
    }
    
    public function setItems($items){
        $this->items=$items;
    }

    public function equals($object){
        if($object instanceof PurchaseOrder){
    
            if($this->id!=$object->id){
                return false;
            }
            
            if($this->hour!=$object->hour){
                return false;
            }
            
            if($this->user!=$object->user){
                return false;
            }
            
            if($this->items!=$object->items){
                return false;
            }
            
            return true;

        }else{
            return false;
        }
    
    }

    public function toString(){
    
        return "  [id:" .$this->id. "]  [hour:" .$this->hour. "]  [user:" .$this->user. "]  [items:" .$this->items. "]  " ;
    }
    
}

?>