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
            'surname' => $this->string(10)->notNull(),
            'gender' => $this->string(10)->notNull(),
            'age' => $this->tinyInteger(2)->notNull(),
            'degree' => $this->string(20)->notNull(),
            'experience' => $this->tinyInteger(2)->notNull(),
            'salary' => $this->tinyInteger(10)->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP()'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    //comment
    public function safeDown()
    {
        $this->dropTable('{{%teachers}}');
    }
}
