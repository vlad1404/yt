<?php

use yii\db\Migration;

/**
 * Class m210131_023941_create_table_products_regions
 */
class m210131_023941_create_table_products_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_regions', [
            'prod_id' => $this->integer(),
            'region_id' => $this->integer(),
        ]);

        $this->addForeignKey('products_regions_products_fk', 'products_regions', 'prod_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('products_regions_tags_fk', 'products_regions', 'region_id', 'regions', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('products_regions_products_fk', 'products_regions');
        $this->dropForeignKey('products_regions_tags_fk', 'products_regions');
        $this->dropTable('products_regions');
    }

}
