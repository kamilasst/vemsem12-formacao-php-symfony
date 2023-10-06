<?php

use alura\Doctrine\Entity\Phone;
use alura\Doctrine\Entity\Student;
use alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

    $entityManager = EntityManagerCreator::createEntityManager();

    $student = new Student("Maria");
    $student->addPhone(new Phone("(90) 98888-9999"));
    $student->addPhone(new Phone("(91) 93333-3333"));

    $entityManager->persist($student);
    $entityManager->flush();

