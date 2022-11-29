<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servicetype}}`.
 */
class m221026_100809_create_servicetype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%servicetype}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),    
            'count' => $this->integer(),
            'is_used' => $this->integer()

    
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%servicetype}}');
    }
}
