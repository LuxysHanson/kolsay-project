<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%settings}}`.
 */
class m220502_203332_add_info_column_to_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%settings}}', 'info', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%settings}}', 'info');
    }
}
