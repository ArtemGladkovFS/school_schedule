<?php


namespace app\components;

use app\models\Room;
use Faker\Factory;
use Faker\Generator;
use yii\db\Exception;

class RoomCreator
{
    private int $count;
    private Generator $faker;
    private array $availableNumbers = [];

    public function __construct(int $count = 10)
    {
        $this->count = $count;
        $this->faker = Factory::create('ru_RU');
    }

    public function run(): void
    {
        echo 'Start processing room creator' . PHP_EOL;
        try {
            for ($i = 0; $i < $this->count; $i++) {
                $this->createRoom();
                echo '.';
            }
        } catch (Exception $e) {
            echo PHP_EOL . 'Error: ' . $e->getMessage() . PHP_EOL;
        }
        echo PHP_EOL . 'End processing room creator' . PHP_EOL;
    }

    private function createRoom(): void
    {
        $faker = $this->faker;
        $room = new Room();

        if (empty($this->availableNumbers)) {
            $this->availableNumbers = range(11, 39);
            shuffle($this->availableNumbers);
        }

        if (empty($this->availableNumbers)) {
            throw new Exception("Все номера комнат в диапазоне заняты!");
        }

        $room->number = array_pop($this->availableNumbers);

        if ($room->number >= 11 && $room->number <= 19) {
            $room->floor = 1;
        } elseif ($room->number >= 20 && $room->number <= 29) {
            $room->floor = 2;
        } else {
            $room->floor = 3;
        }

        if (!$room->save()) {
            throw new Exception("Ошибка сохранения комнаты: " . json_encode($room->errors));
        }
    }
}
