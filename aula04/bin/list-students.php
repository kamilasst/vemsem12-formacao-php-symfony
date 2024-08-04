<?php

use alura\Doctrine\Entity\Course;
use alura\Doctrine\Entity\Phone;
use alura\Doctrine\Entity\Student;
use alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//$dql = 'SELECT student, phone, course
//            FROM alura\\Doctrine\\Entity\\Student student
//    LEFT JOIN student.phones phone
//    LEFT JOIN student.courses course';
//
///** @var Student[]  $studentList */
//$studentList = $entityManager->createQuery($dql)->getResult(); //createQuery - cria uma consulta DQL, é usada para consultar objetos de entidades mapeadas no banco de dados
//                                                                //getResult - executa a consulta DQL e retorna o resultado

$studentRepository = $entityManager->getRepository(Student::class);
$studentList = $studentRepository->studentsAndCourses();

foreach ($studentList as $student) {
    echo "ID: $student->id" . PHP_EOL . "Nome: $student->nome" . PHP_EOL;
    echo "Telefones:";

    if ($student->phones()->count() > 0) {
        echo implode(", ", $student->phones()
            ->map(fn (Phone $phone) => $phone->number)
        ->toArray() );
    }

    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Cursos:";

        echo implode(", ", $student->courses()
            ->map(fn (Course $course) => $course->nome)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}

$studentClass = Student::class;

$dql = "SELECT COUNT(student) FROM $studentClass student WHERE student.phones IS EMPTY";
var_dump($entityManager->createQuery($dql)->getSingleScalarResult());


