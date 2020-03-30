<?php

namespace WaterStore\DAOs;

use WaterStore\DAOs\AbstractDAO;
use WaterStore\Models\PurchaseOrder;

class PurchaseOderDAO extends AbstractDAO {

    public function __construct() {
        parent::__construct("WaterStore\Models\PurchaseOrder");
    }

    public function insert(PurchaseOrder $purchaseOder){
        $userInDatabase = $this->entityManager->find("WaterStore\Models\User", $purchaseOder->getUser()->getId());
        $purchaseOder->setUser($userInDatabase);
        parent::insert($purchaseOder); 
    }
}
?>