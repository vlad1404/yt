<?php

use yii\db\Migration;

/**
 * Class m210131_004158_create_table_product
 */
class m210131_004158_create_table_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'price' => $this->decimal(11,2)
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
