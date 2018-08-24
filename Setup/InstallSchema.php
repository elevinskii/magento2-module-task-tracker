<?php
namespace IdealCode\TaskTracker\Setup;

use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $setup->startSetup();

        /**
         * Create new table with tasks
         */
        $table = $setup->getConnection()->newTable(
            $setup->getTable('tasktracker_task')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false]
        )->addColumn(
            'status_id',
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false]
        )->addColumn(
            'description',
            Table::TYPE_TEXT
        )->addColumn(
            'assigned_to',
            Table::TYPE_TEXT,
            255
        )->addColumn(
            'start_time',
            Table::TYPE_DATETIME
        )->addColumn(
            'end_time',
            Table::TYPE_DATETIME
        )->addForeignKey(
            $setup->getFkName(
                'tasktracker_task',
                'status_id',
                'tasktracker_task_status',
                'id'
            ),
            'status_id',
            $setup->getTable('tasktracker_task_status'),
            'id'
        );
        $setup->getConnection()->createTable($table);

        /**
         * Create new table with task statuses
         */
        $table = $setup->getConnection()->newTable(
            $setup->getTable('tasktracker_task_status')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false]
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
