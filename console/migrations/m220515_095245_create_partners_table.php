<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partners}}`.
 */
class m220515_095245_create_partners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%partners}}', [
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
        $this->dropTable('{{%partners}}');
    }
}
