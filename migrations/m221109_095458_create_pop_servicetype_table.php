<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pop_servicetype}}`.
 */
class m221109_095458_create_pop_servicetype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pop_servicetype}}', [
            'id' => $this->primaryKey(),
            'pop_id' => $this->integer(), 
            'service_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-pop_popservicetype', 'pop_servicetype', 'pop_id','pop', 'id');
        $this->addForeignKey('fk-service_popservicetype', 'pop_servicetype', 'service_id', 'servicetype','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pop_servicetype}}');
    }
}
