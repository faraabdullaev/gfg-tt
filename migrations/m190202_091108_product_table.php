<?php

use yii\db\Migration;

/**
 * Class m190202_091108_product_table
 */
class m190202_091108_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'brand' => $this->string(100)->notNull(),
            'price' => $this->float()->defaultValue(0.0),
            'stock' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_091108_product_table cannot be reverted.\n";

        return false;
    }
    */
}
