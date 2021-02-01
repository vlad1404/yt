<?php

use yii\db\Migration;

/**
 * Class m210131_022416_create_table_products_tags
 */
class m210131_022416_create_table_products_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_tags', [
            'prod_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        $this->addForeignKey('products_tags_products_fk', 'products_tags', 'prod_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('products_tags_tags_fk', 'products_tags', 'tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('products_tags_products_fk', 'products_tags');
        $this->dropForeignKey('products_tags_tags_fk', 'products_tags');
        $this->dropTable('products_tags');
    }

}
