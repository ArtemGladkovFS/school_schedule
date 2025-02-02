<?php

namespace app\components;

use app\models\Student;
use Faker\Factory;
use Faker\Generator;
use Random\RandomException;
use Yii;
use yii\base\BaseObject;
use yii\db\Exception;

class StudentCreator
{
    /** @var int - Кол-во создаваемых учеников */
    private int $count;

    /** @var Generator|null - Объект для генерации рандомных данных */
    private ?Generator $faker = null;

    public function __construct(int $count = 20)
    {
        $this->count = $count;
        $this->faker = Factory::create();
    }

    private function createStudents(): Student
    {
        $faker = $this->faker;
        $student = new Student();
        $gender = $student->gender = random_int(0, 1);
        $student->name = $faker->firstName($gender);
        $student->surname = $faker->lastName($gender);
        $student->gender = $faker->email();
        $student->save();
        return $student;
    }
}