<?php

use yii\db\Migration;

/**
 * Class m250112_113410_create_table_classes
 */
class m241220_113410_create_table_classes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%classes}}', [
            'id' => $this->primaryKey(),
            'class_name' => $this->string(10)->notNull(),
            'class_level' => $this->tinyInteger(2)->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%classes}}');
    }

}
