<?php
namespace WaterStore\Models;

/**
 * @Entity
 * @Table(name="item")
 */
class Item{

    /**
     * @var integer @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ManyToOne(targetEntity="PurchaseOrder")
     * @JoinColumn(name="purchase_order_id", referencedColumnName="id")
     */
    private $purchaseOrder;
    
    /**
     *
     * @var string @Column(type="string", length=255)
     */
    private $productName;
    
    /**
     *
     * @var string @Column(type="integer", length=255)
     */
    private $amount;
    
    public function __construct($id = 0,$purchaseOrder = 0,$productName= "" ,$amount = 0){
        $this->id = $id;
        $this->purchaseOrder = $purchaseOrder;
        $this->productName = $productName;
        $this->amount = $amount;
    }
    
    public static function construct($array){
        $item = new Item();
        $item->setId( $array['id']);
        $item->setPurchaseOrder( $array['purchaseOrder']);
        $item->setProductName( $array['productName']);
        $item->setAmount( $array['amount']);
        return $item;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getPurchaseOrder(){
        return $this->purchaseOrder;
    }
    
    public function setPurchaseOrder($purchaseOrder){
        $this->purchaseOrder=$purchaseOrder;
    }
    
    public function getProductName(){
        return $this->productName;
    }
    
    public function setProductName($productName){
        $this->productName=$productName;
    }
    
    public function getAmount(){
        return $this->amount;
    }
    
    public function setAmount($amount){
        $this->amount=$amount;
    }

    public function equals($object){
        if($object instanceof PurchaseOrder){
        
            if($this->id!=$object->id){
                return false;
            }
            
            if($this->purchaseOrder!=$object->purchaseOrder){
                return false;
            }
            
            if($this->productName!=$object->productName){
                return false;
            }
            
            if($this->amount!=$object->amount){
                return false;
            }
            
            return true;
    
        }else{
            return false;
        }
    }

    public function toString(){

        return "  [id:" .$this->id. "]  [purchaseOrder:" .$this->purchaseOrder. "]  [productName:" .$this->productName. "]  [amount:" .$this->amount. "]  " ;
    }
    
}

?>