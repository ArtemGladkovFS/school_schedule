<?php

use yii\db\Migration;

/**
 * Class m250304_170714_fix_courses_table
 */
class m250304_170714_fix_courses_table extends Migration
{
    /**
     * Exchange column name at table courses to max length 50
     */
    public function safeUp()

    {
        $this->alterColumn('courses', 'name', $this->string(50)->notNull());
    }


    public function safeDown()
    {
        echo "m250304_170714_fix_courses_table cannot be reverted.\n";

        return false;
    }

}
