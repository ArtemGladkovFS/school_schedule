<?php


namespace app\commands;

use app\components\StudentCreator;
use Yii;
use yii\console\Controller;
use Faker\Factory;
use app\models\Student;

class StudentController extends Controller
{
    public function actionCreate(int $count = 20)
    {
        $creator = new StudentCreator($count);
        $creator->run();
        return ExitCode::OK;
    }
}