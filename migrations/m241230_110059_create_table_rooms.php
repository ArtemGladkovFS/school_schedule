<?php

use yii\db\Migration;

/**
 * Class m250112_110059_create_table_rooms
 */
class m241230_110059_create_table_rooms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rooms}}', [
            'id' => $this->primaryKey(),
            'number' => $this->tinyInteger(2)->notNull(),
            'floor' => $this->tinyInteger(1)->notNull(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->createIndex('idx-rooms-number','rooms',"number");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rooms}}');
    }

}
