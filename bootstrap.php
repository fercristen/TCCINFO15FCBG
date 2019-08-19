<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Model"), \Estrutura\Configuration\DataBase::isDevMode());

$entityManager = EntityManager::create(\Estrutura\Configuration\DataBase::getConnectionConfiguration(), $config);
$conection = new \Estrutura\DataBase\Connection();
$conection::setEntityManager($entityManager);