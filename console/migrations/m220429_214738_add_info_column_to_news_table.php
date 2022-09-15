<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%news}}`.
 */
class m220429_214738_add_info_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%news}}', 'info', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%news}}', 'info');
    }
}
