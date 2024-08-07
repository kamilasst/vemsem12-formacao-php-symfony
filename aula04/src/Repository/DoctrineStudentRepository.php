<?php

namespace alura\Doctrine\Repository;

use alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
 public function studentsAndCourses(): array
 {
     return $this->createQueryBuilder('student')
         ->addSelect('phone')
         ->addSelect('course')
         ->leftJoin('student.phones', 'phone')
         ->leftJoin('student.courses', 'course')
         ->getQuery()
         ->getResult();

//     $dql = 'SELECT student, phone, course
//                FROM alura\\Doctrine\\Entity\\Student student
//        LEFT JOIN student.phones phone
//        LEFT JOIN student.courses course';
//     return $this->getEntityManager()
//         ->createQuery($dql)
//         ->getResult();
    }
}