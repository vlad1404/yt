<?php

use yii\db\Migration;

/**
 * Class m210131_011457_create_table_categories
 */
class m210131_011457_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories',
        [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer()
        ]);

        $this->addForeignKey('categories_parent_id_fk', 'categories', 'parent_id', 'categories', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('categories_parent_id_fk', 'categories');
        $this->dropTable('categories');
    }

}
