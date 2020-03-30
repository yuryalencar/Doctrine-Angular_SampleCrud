<?php
namespace WaterStore\Controllers;

use WaterStore\Models\PurchaseOrder;
use WaterStore\DAOs\PurchaseOderDAO;

class PurchaseOrderController {

    private $dao;

    public function __construct() {
        $this->setDao(new PurchaseOderDAO());
    }

    public function getDao(){
        return $this->dao;
    }

    public function setDao(PurchaseOderDAO $purchaseDao){
        $this->dao = $purchaseDao;
    }

    public function get($purchaseId){}

    public function insert($purchaseJson){}

    public function update($purchaseId, $purchaseJson){}

    public function delete($purchaseId){
        if($this->purchaseExists($purchaseId)){
            $purchaseToDelete = $this->getDao()->findById($purchaseId);
            $this->getDao()->delete($purchaseToDelete);
            return ["message" => "Purchase Order Removed Successfully"];    
        }
        return ["message" => "Purchase Order Not Found :("];    
    }

    private function purchaseExists($purchaseId){
        $purchaseExists = $this->getDao()->findById($purchaseId);
        return $purchaseExists != null;
    }
}

?>