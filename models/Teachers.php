<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property int $age
 * @property int $degree
 * @property int $experience
 * @property int $salary
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Courses[] $courses
 * @property Schedule[] $schedules
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'gender', 'age', 'degree', 'experience', 'salary'], 'required'],
            [['gender'], 'string'],
            [['age', 'degree', 'experience', 'salary'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 10],
            [['surname'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'gender' => 'Gender',
            'age' => 'Age',
            'degree' => 'Degree',
            'experience' => 'Experience',
            'salary' => 'Salary',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::class, ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['teacher_id' => 'id']);
    }
}
