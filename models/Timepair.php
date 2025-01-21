<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timepair".
 *
 * @property int $id
 * @property string $start_pair
 * @property string $end_pair
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Schedule[] $schedules
 */
class Timepair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timepair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_pair', 'end_pair'], 'required'],
            [['start_pair', 'end_pair', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_pair' => 'Start Pair',
            'end_pair' => 'End Pair',
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
        return $this->hasMany(Schedule::class, ['timepair_id' => 'id']);
    }
}
