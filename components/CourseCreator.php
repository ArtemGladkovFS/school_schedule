<?php


namespace app\components;

use app\models\Course;
use app\models\Room;
use app\models\Teacher;
use Faker\Factory;
use Faker\Generator;
use Random\RandomException;
use Yii;
use yii\base\BaseObject;
use yii\db\Exception;

class CourseCreator
{
    private array $courseNames = ["алгебра", "геометрия", "физика", "химия", "русский язык", "литература", "обществознание", "экономика", "право", "география", "английский язык", "физкультура", "история", "начальная военная подготовка", "астрономия", "информатика", "биология"];

    public function run(): void
    {
        echo 'Start processing courses creator ' . PHP_EOL;

        $this->createCourses();

        echo PHP_EOL . 'End processing courses creator ' . PHP_EOL;
    }

    private function createCourses(): void
    {
        $teachers = Teacher::find()->all();

        if (count($teachers) < count($this->courseNames)) {
            echo 'Ошибка: недостаточно учителей для всех предметов' . PHP_EOL;
            return;
        }

        shuffle($teachers);

        $rooms = Room::find()->all();

        if (empty($rooms)) {
            echo 'Ошибка: нет доступных кабинетов' . PHP_EOL;
            return;
        }

        $createdCount = 0;

        foreach ($this->courseNames as $index => $name) {
            $course = new Course();
            $course->name = $name;
            $course->teacher_id = $teachers[$index]->id;
            $randomRoomIndex = array_rand($rooms);
            $course->room_id = $rooms[$randomRoomIndex]->id;

            if ($course->save()) {
                $createdCount++;
                echo '.';
            } else {
                echo 'E';
                echo PHP_EOL . "Ошибка при сохранении курса '{$name}': " .
                    implode('; ', $course->getErrorSummary(true)) . PHP_EOL;
            }
        }

        echo PHP_EOL . "Успешно создано курсов: $createdCount из " . count($this->courseNames) . PHP_EOL;
    }
}