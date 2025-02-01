<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $room_id
 * @property int $course_id
 * @property int $class_id
 * @property int $timepair_id
 * @property int $day_of_week
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Classes $class
 * @property Courses $course
 * @property Rooms $room
 * @property Teachers $teacher
 * @property Timepair $timepair
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id', 'room_id', 'course_id', 'class_id', 'timepair_id', 'day_of_week'], 'required'],
            [['teacher_id', 'room_id', 'course_id', 'class_id', 'timepair_id', 'day_of_week'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_id', 'course_id', 'teacher_id', 'timepair_id', 'day_of_week'], 'unique', 'targetAttribute' => ['class_id', 'course_id', 'teacher_id', 'timepair_id', 'day_of_week']],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::class, 'targetAttribute' => ['class_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::class, 'targetAttribute' => ['course_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rooms::class, 'targetAttribute' => ['room_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::class, 'targetAttribute' => ['teacher_id' => 'id']],
            [['timepair_id'], 'exist', 'skipOnError' => true, 'targetClass' => Timepair::class, 'targetAttribute' => ['timepair_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'Учитель',
            'room_id' => 'Кабинет',
            'course_id' => 'Предмет',
            'class_id' => 'Класс',
            'timepair_id' => 'Урок',
            'day_of_week' => 'День недели',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Class]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::class, ['id' => 'class_id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Rooms::class, ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::class, ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[Timepair]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimepair()
    {
        return $this->hasOne(Timepair::class, ['id' => 'timepair_id']);
    }
}
