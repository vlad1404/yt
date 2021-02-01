<?php

use yii\db\Migration;

/**
 * Class m210131_012736_create_table_prod_cats
 */
class m210131_012736_create_table_prod_cats extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_category',
        [
            'prod_id' => $this->integer(),
            'cat_id' => $this->integer()
        ]);
        $this->addForeignKey('product_category_prod_id_fk','product_category','prod_id','products','id','CASCADE', 'CASCADE');
        $this->addForeignKey('product_category_cat_id_fk','product_category','cat_id','categories','id','CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('product_category_prod_id_fk','product_category');
        $this->dropForeignKey('product_category_cat_id_fk','product_category');
        $this->dropTable('product_category');
    }
}
