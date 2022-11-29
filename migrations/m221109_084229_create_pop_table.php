<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pop}}`.
 */
class m221109_084229_create_pop_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pop}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),    
            'address' => $this->string(),
            'count' => $this->integer(),
            'type' => $this->string(),
            'is_used' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pop}}');
    }
}
