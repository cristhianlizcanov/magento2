<?php

namespace Prueba\Helpdesk\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('bicicletasmilan_helpdesk_ticket')
        )->addColumn(
            'ticket_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Ticket Id'
        )->addColumn(
            'customer_id',
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true],
            'Customer Id'
        )->addColumn(
            'title',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'Title'
        )->addColumn(
            'severity',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Severity'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false],
            'Created At'
        )->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Status'
        )->addIndex(
            $installer->getIdxName(
                'bicicletasmilan_helpdesk_ticket',
                ['customer_id']
            ),
            ['customer_id']
        )->addForeignKey(
            $installer->getFkName(
                'bicicletasmilan_helpdesk_ticket',
                'customer_id',
                'customer_entity',
                'entity_id'
            ),
            'customer_id',
            $installer->getTable('customer_entity'),
            'entity_id',
            Table::ACTION_SET_NULL
        )->setComment('Prueba Helpdesk Ticket');

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
