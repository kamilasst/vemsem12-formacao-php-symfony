<?php

namespace alura\Doctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{

    public static function createEntityManager(): EntityManager //Entity Manager - interage com o banco de dados e gerencia as entidades
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/.."),
            isDevMode: true
        );

        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $loMiddleware = new Middleware($consoleLogger);
        $config->setMiddlewares([$loMiddleware]);

        $cacheDirectory = __DIR__ . '/../../var/cache';

        $config->setMetadataCache(
            new PhpFilesAdapter(
                namespace: 'metadata_cache',
                directory: $cacheDirectory
            )
        );

        $config->setMetadataCache(
            new PhpFilesAdapter(
                namespace: 'query_cache',
                directory: $cacheDirectory
            )
        );

        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => '3306',
            'dbname' => 'students',
            'user' => 'root',
            'password' => 'Mydb@12345!'
        ], $config);

        return new EntityManager($connection, $config);

//        $connection = DriverManager::getConnection([
//            'driver' => 'pdo_sqlite',
//            'path' => __DIR__ . '/../../db.sqlite',
//        ], $config);




    }
}