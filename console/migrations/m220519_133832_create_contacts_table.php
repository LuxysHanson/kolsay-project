<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m220519_133832_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'number' => $this->string(),
            'email' => $this->string(),
            'position' => $this->string(),
            'type' => $this->integer(),
            'image' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'info' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
