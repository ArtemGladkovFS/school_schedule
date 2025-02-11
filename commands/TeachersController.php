<?php


namespace app\commands;

use Yii;
use app\components\TeacherCreator;
use yii\console\Controller;
use yii\console\ExitCode;


class TeachersController extends Controller
{
    public function actionCreate(int $count = 1)
    {
        $creator = new TeacherCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}