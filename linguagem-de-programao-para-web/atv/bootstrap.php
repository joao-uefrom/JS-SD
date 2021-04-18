<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$paths = array(__DIR__."\src\Classes");
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// Dados da conexão
$conn = array(
    'driver'   => 'pdo_pgsql',
    'user'     => 'postgres',
    'password' => '2902',
    'dbname'   => 'atv',
);

$entityManager = EntityManager::create($conn, $config);
