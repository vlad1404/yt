<?php

use yii\db\Migration;

/**
 * Class m210131_023436_create_table_regions
 */
class m210131_023436_create_table_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('regions', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('regions');
    }

}
