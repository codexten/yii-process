<?php

namespace codexten\yii\process\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%background_process}}`.
 */
class M190329145511Create_background_process_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%background_process}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'pid' => $this->integer(11),
            'comment' => $this->string(255),
            'run_command' => $this->text(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%background_process}}');
    }
}
