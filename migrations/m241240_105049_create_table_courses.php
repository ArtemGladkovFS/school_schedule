<?php

use yii\db\Migration;

/**
 * Class m250112_105049_create_table_courses
 */
class m241240_105049_create_table_courses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'room_id' => $this->integer()->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP']);

        $this->addForeignKey('fk-courses-teacher_id', '{{%courses}}', 'teacher_id', '{{%teachers}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-courses-room_id', '{{%courses}}', 'room_id', '{{%rooms}}', 'id', 'CASCADE');
        $this->createIndex('idx-courses-name','courses',"name");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%courses}}');

    }

}
