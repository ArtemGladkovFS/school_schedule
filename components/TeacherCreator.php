<?php


namespace app\components;

use app\models\Teacher;
use Faker\Factory;
use Faker\Generator;
use Random\RandomException;
use Yii;
use yii\base\BaseObject;
use yii\db\Exception;

class TeacherCreator
{
    /** @var int - Кол-во создаваемых учителей */
    private int $count;

    /** @var Generator|null - Объект для генерации рандомных данных */
    private ?Generator $faker = null;

    public function __construct(int $count = 20)
    {
        $this->count = $count;
        $this->faker = Factory::create('ru_RU');
    }
    public function run(): void
    {
        echo 'Start processing teacher creator ' . PHP_EOL;
        for ($i = 0; $i < $this->count; $i++) {
            $this->createTeacher();
            echo '.';
        }
        echo PHP_EOL .' End processing teacher creator ' . PHP_EOL;
        }

    private function createTeacher(): Teacher
    {
        $faker = $this->faker;
        $teacher = new Teacher();
        $gender = $faker->randomElement(['male', 'female']);
        $teacher->gender = $gender;
        $teacher->surname = ($gender === 'male') ? $faker->lastName : $faker->lastName . 'а';
        $teacher->name = ($gender === 'male') ? $faker->firstNameMale : $faker->firstNameFemale;
        $teacher->age = $faker->numberBetween(25, 65);
        $teacher->degree = $faker->randomElement(['Магистр', 'Кандидат наук', 'Доктор наук']);
        $teacher->experience = $faker->numberBetween(1, max(1, $teacher->age - 22));
        $teacher->salary = $faker->numberBetween(40000, 150000);
        $teacher->save();
        if (!$teacher->save()) {
            var_dump($teacher->errors);
            exit;
        }
        return $teacher;
    }

}