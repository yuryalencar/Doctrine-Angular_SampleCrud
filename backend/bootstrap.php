<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$entitiesPath = __DIR__."/src/WaterStore/Entities";
$config = Setup::createAnnotationMetadataConfiguration(array($entitiesPath), $isDevMode);

$connection = array(
    'dbname'   => 'waterstore',
    'user'     => 'root',
    'password' => '',
    'host'     => 'localhost',
    'driver'   => 'pdo_mysql',
);

$entityManager = EntityManager::create($connection, $config);

?>