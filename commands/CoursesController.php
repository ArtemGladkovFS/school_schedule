<?php


namespace app\commands;

use Yii;
use app\components\CourseCreator;
use yii\console\Controller;
use yii\console\ExitCode;


/**
 * Populates the database with fake data about school subjects, checking the number of teachers and classrooms beforehand
 */
class CoursesController extends Controller
{
    public function actionCreate()
    {
        $creator = new CourseCreator;
        $creator->run();
        return ExitCode::OK;
    }
}