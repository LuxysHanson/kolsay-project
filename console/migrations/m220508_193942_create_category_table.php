<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220508_193942_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'alias' => $this->string(255),
            'is_deleted' => $this->integer(1)->defaultValue(0),
            'info' => $this->text(),
        ]);
        $this->batchInsert('{{%category}}', ['title', 'alias'], [
            ['Счетчики Банкнот', 'banknote-counters'],
            ['Сортировщики Банкнот', 'banknote-sorters'],
            ['Счетчики Монет', 'coin-counters'],
            ['Сортировщики Монет', 'coin-sorters'],
            ['Вакуумные Упаковщики', 'vacuum-packers'],
            ['Детекторы Валют', 'currency-detectors'],
            ['Электронные Кассиры', 'electronic-cashiers'],
            ['Автоматизированные Депозитные Машины', 'automated-deposit-machines'],
            ['Виртуальные Банковские Машины', 'virtual-banking-machines'],
            ['Санитайзеры', 'health'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
