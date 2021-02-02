<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210202_210058_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'task' => $this->text()->notNull(),
            'created_by' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-task-created_by}}',
            '{{%task}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-task-created_by}}',
            '{{%task}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-task-updated_by}}',
            '{{%task}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-task-updated_by}}',
            '{{%task}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-task-created_by}}',
            '{{%task}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-task-created_by}}',
            '{{%task}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-task-updated_by}}',
            '{{%task}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-task-updated_by}}',
            '{{%task}}'
        );

        $this->dropTable('{{%task}}');
    }
}
