<?php

namespace app\components;

use app\models\SchoolClass;
use app\models\Student;
use Faker\Factory;
use Faker\Generator;


class StudentCreator
{
    /** @var int - Кол-во создаваемых учеников */
    private int $count;

    /** @var Generator|null - Объект для генерации рандомных данных */
    private ?Generator $faker = null;

    public function __construct(int $count)
    {
        $this->count = $count;
        $this->faker = Factory::create('ru_RU');
    }

    public function run(): void
    {
        echo 'Start processing student creator ' . PHP_EOL;
        for ($i = 0; $i < $this->count; $i++) {
            $this->createStudents();
            echo '.';
        }
        echo PHP_EOL .' End processing student creator ' . PHP_EOL;
    }

    private function createStudents(): Student
    {
        $faker = $this->faker;
        $student = new Student();
        $gender = $faker->randomElement(['male', 'female']);
        $student->gender = $gender;
        $student->surname = ($gender === 'male') ? $faker->lastName : $faker->lastName . 'а';
        $student->name = ($gender === 'male') ? $faker->firstNameMale : $faker->firstNameFemale;
        $availableClasses = SchoolClass::find()
            ->alias('c')
            ->leftJoin(['sc' => '(SELECT class_id, COUNT(*) as count FROM students GROUP BY class_id)'],
                'sc.class_id = c.id')
            ->where('IFNULL(sc.count, 0) < 25')
            ->orderBy('RAND()')
            ->one();

        if ($availableClasses) {
            $student->class_id = $availableClasses->id;
        } else {
            $randomClass = SchoolClass::find()->orderBy('RAND()')->one();
            $student->class_id = $randomClass->id;
        }

        $class = SchoolClass::findOne($student->class_id);
        $student->age = $class->class_level + 7;
        $student->save();
        return $student;
    }
}