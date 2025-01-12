<?php

use yii\db\Migration;

/**
 * Class m250112_112524_create_table_shedule
 */
class m241245_112524_create_table_shedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer()->notNull(),
            'room_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'class_id' => $this->integer()->notNull(),
            'timepair_id' => $this->integer()->notNull(),
            'day_of_week' => $this->tinyInteger(1)->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->addForeignKey('fk-schedule-teacher_id', '{{%schedule}}', 'teacher_id', '{{%teachers}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-schedule-room_id', '{{%schedule}}', 'room_id', '{{%rooms}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-schedule-course_id', '{{%schedule}}', 'course_id', '{{%courses}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-schedule-class_id', '{{%schedule}}', 'class_id', '{{%classes}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-schedule-timepair_id', '{{%schedule}}', 'timepair_id', '{{%timepair}}', 'id', 'CASCADE');
        $this->createIndex('idx-schedule-unique', '{{%schedule}}', ['class_id', 'course_id', 'teacher_id', 'timepair_id', 'day_of_week'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shedule}}');
    }

}
