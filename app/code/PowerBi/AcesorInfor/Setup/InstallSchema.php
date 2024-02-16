<?php

namespace PowerBi\AcesorInfor\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable(
                $installer->getTable('powerbi_acesorinfo_entity')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'auser_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'User ID'
            )->addColumn(
                'title',
                Table::TYPE_TEXT,
                100,
                [],
                'Title'
            )
            ->addColumn(
                'url_powerbi',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Url que redirecciona al reporte en PowerBI'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Created timestamp'
            )->addIndex(
                $installer->getIdxName(
                    'powerbi_acesorinfo_entity',
                    ['auser_id']
                ),
                ['auser_id']
            )->addIndex(
                $installer->getIdxName(
                    'powerbi_acesorinfo_entity',
                    ['title']
                ),
                ['title']
            )->addForeignKey(
                $installer->getFkName(
                    'powerbi_acesorinfo_entity',
                    'auser_id',
                    'admin_user',
                    'user_id'
                ),
                'auser_id',
                $installer->getTable('admin_user'),
                'user_id',
                Table::ACTION_SET_NULL
            )->setComment('Tabla para ver los reportes de powerBI de los asesores');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
