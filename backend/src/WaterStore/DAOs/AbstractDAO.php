<?php

namespace WaterStore\DAOs;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;


class AbstractDAO  {

    private $entityPath;
    protected $entityManager;
    
    private $connectionOptions = array(
        'dbname'   => 'waterstore',
        'user'     => 'root',
        'password' => '',
        'host'     => 'localhost',
        'driver'   => 'pdo_mysql',
    );

    public function __construct($entityPath) {
        $this->entityPath = $entityPath;
        $this->entityManager = $this->createEntityManager();
    }

    private function createEntityManager(){
        $path = array(
            "WaterStore/Models"
        );
        $devMode = true;
        
        $config = Setup::createAnnotationMetadataConfiguration($path, $devMode);
        
        return EntityManager::create($this->connectionOptions, $config);           
    }

    public function insert($entity){

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
    
    public function update($entity){
        $this->entityManager->merge($entity);
        $this->entityManager->flush();
    }
    
    public function delete($id){
        $this->entityManager->remove($id);
        $this->entityManager->flush();
    }
    
    public function findById($id){
        return $this->entityManager->find($this->entityPath, $id);
    }
    
    public function findAll(){
        $collection = $this->entityManager->getRepository($this->entityPath)->findAll();

        $entities = array();
        foreach ($collection as $entity) {
            $entities[] = $entity;
        }

        return $entities;
    }
}
?>