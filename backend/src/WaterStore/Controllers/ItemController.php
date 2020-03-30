<?php
namespace WaterStore\Controllers;

use WaterStore\Models\Item;
use WaterStore\DAOs\ItemDAO;

class ItemController {

    private $dao;

    public function __construct() {
        $this->setDao(new ItemDAO());
    }

    public function getDao(){
        return $this->dao;
    }

    public function setDao(ItemDAO $itemDao){
        $this->dao = $itemDao;
    }

    public function get($itemId){}

    public function insert($itemJson){}

    public function update($itemId, $itemJson){}

    public function delete($itemId){
        if($this->itemExists($itemId)){
            $itemToDelete = $this->getDao()->findById($itemId);
            $this->getDao()->delete($itemToDelete);
            return ["message" => "Item Removed Successfully"];    
        }
        return ["message" => "Item Not Found :("];    
    }

    private function itemExists($itemId){
        $itemExists = $this->getDao()->findById($itemId);
        return $itemExists != null;
    }
}

?>