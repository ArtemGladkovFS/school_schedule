<?php


namespace app\commands;

use app\components\RoomCreator;
use Yii;
use yii\console\Controller;
use Faker\Factory;
use app\models\Room;
use yii\console\ExitCode;

class RoomsController extends Controller
{
    public function actionCreate(int $count = 1)
    {
        $creator = new RoomCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}