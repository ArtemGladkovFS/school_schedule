<?php


namespace app\commands;

use Yii;
use app\components\TeacherCreator;
use yii\console\Controller;
use yii\console\ExitCode;


class TeacherController extends Controller
{
    public function actionIndex(int $count = 20)
    {
        $creator = new TeacherCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}