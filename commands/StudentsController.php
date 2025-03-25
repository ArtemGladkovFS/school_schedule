<?php


namespace app\commands;

use app\components\StudentCreator;
use yii\console\Controller;
use yii\console\ExitCode;

class StudentsController extends Controller
{
    public function actionCreate(int $count)
    {
        $creator = new StudentCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}