<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m220510_071427_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'alias' => $this->string(255),
            'price' => $this->integer(11),
            'category_id' => $this->integer(11),
            'description' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'status' => $this->integer(1),
            'attachments' => $this->text(),
            'info' => $this->text(),
        ]);
        $this->addForeignKey('fk-items-category', '{{%items}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-items-category', '{{%items}}');
        $this->dropTable('{{%items}}');
    }
}
