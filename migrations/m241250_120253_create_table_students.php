<?php

use yii\db\Migration;

/**
 * Class m241230_120253_create_table_students
 */
class m241250_120253_create_table_students extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(15)->notNull(),
            'surname' => $this->string(15)->notNull(),
            'gender' => "ENUM('male', 'female') NOT NULL",
            'age' => $this->tinyInteger(2)->notNull(),
            'class_id' => $this->Integer()->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->addForeignKey('fk-students-class_id', '{{%students}}', 'class_id', '{{%classes}}', 'id', 'CASCADE');
        $this->createIndex('idx-students-surname','students',"surname");
        $this->createIndex('idx-students-age', '{{%students}}', 'age');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }

}
