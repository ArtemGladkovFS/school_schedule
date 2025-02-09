<?php


namespace app\commands;

use Yii;
use app\components\TeacherCreator;
use yii\console\Controller;
use yii\console\ExitCode;


class TeacherController extends Controller
{
    public function actionIndex(int $count = 1)
    {
        $creator = new TeacherCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}