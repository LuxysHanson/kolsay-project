<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m220515_095225_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'alias' => $this->string(255),
            'image' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'status' => $this->integer(1),
            'info' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
