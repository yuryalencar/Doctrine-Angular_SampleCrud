<?php

namespace WaterStore\DAOs;

use WaterStore\DAOs\AbstractDAO;

class UserDAO extends AbstractDAO {

    public function __construct() {
        parent::__construct("WaterStore\Models\User");
    }
}
?>