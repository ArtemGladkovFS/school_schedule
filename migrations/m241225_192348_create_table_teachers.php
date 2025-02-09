<?php

use yii\db\Migration;

/**
 * Class m241225_192348_create_table_teachers
 */
class m241225_192348_create_table_teachers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teachers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull(),
            'surname' => $this->string(15)->notNull(),
            'gender' => "ENUM('male', 'female') NOT NULL",
            'age' => $this->tinyInteger(2)->notNull(),
            'degree' => $this->string(50)->notNull(),
            'experience' => $this->tinyInteger(2)->notNull(),
            'salary' => $this->Integer(10)->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->createIndex('idx-teachers-surname','teachers',"surname");
    }


    public function safeDown()
    {
        $this->dropTable('{{%teachers}}');
    }
}
