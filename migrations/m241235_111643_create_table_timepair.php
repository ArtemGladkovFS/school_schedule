<?php

use yii\db\Migration;

/**
 * Class m250112_111643_create_table_timepair
 */
class m241235_111643_create_table_timepair extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%timepair}}', [
            'id' => $this->primaryKey(),
            'start_pair' => 'TIME NOT NULL',
            'end_pair' => 'TIME NOT NULL',
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%timepair}}');
    }
}
