<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require "vendor/autoload.php";
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array("src"), $isDevMode);

$connection = array(
					"dbname" => "crud",
					"user" => "root",
					"password" => "",
					"host" => "localhost",
					"driver" => "pdo_mysql"
					);
$entityManager = EntityManager::create($connection,$config);
