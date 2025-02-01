<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property string $class_name
 * @property int $class_level
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Schedule[] $schedules
 * @property Students[] $students
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_name', 'class_level'], 'required'],
            [['class_level'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_name'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Литера класса',
            'class_level' => 'Номер класса',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['class_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::class, ['class_id' => 'id']);
    }
}
