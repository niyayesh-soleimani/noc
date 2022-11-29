<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m221116_063534_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'users' => $this->string(),    
            'servicetype' => $this->integer(),
            'poppointtype' => $this->integer(),  
            'user_id' =>$this->integer(),
        ]);
        $this->addForeignKey('fk-pop_service','service','poppointtype','pop','id');
        $this->addForeignKey('fk-user-service','service', 'user_id','user', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk-servicetype_service', 'service', 'servicetype', 'servicetype','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
