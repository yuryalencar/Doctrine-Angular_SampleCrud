<?php

namespace WaterStore\DAOs;

use WaterStore\DAOs\AbstractDAO;

class ItemDAO extends AbstractDAO {

    public function __construct() {
        parent::__construct("WaterStore\Models\Item");
    }
}
?>