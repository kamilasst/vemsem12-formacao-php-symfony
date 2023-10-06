<?php

    require_once "vendor/autoload.php";

    $entityManager = \alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();
    var_dump($entityManager);


