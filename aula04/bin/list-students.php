<?php

use alura\Doctrine\Entity\Course;
use alura\Doctrine\Entity\Phone;
use alura\Doctrine\Entity\Student;
use alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[]  $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: $student->id" . PHP_EOL . "Nome: $student->nome" . PHP_EOL;
    echo "Telefones:" . PHP_EOL;

    if ($student->phones()->count() > 0) {
        echo implode(", ", $student->phones()
            ->map(fn (Phone $phone) => $phone->number)
        ->toArray());
    }

    echo "Cursos:" . PHP_EOL;

    if ($student->courses()->count() > 0) {
        echo implode(", ", $student->courses()
            ->map(fn (Course $course) => $course->nome)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}

echo $studentRepository->count([]) . PHP_EOL;

