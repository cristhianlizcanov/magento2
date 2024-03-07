<?php

namespace PowerBi\AddReport\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    protected $authorization;
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
    
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable(
                $installer->getTable('rutavity_reports')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'role_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'Role ID'
            )->addColumn(
                'report_name',
                Table::TYPE_TEXT,
                100,
                [],
                'Report Name'
            )
            ->addColumn(
                'report_link',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Report Link'
            ) ->addColumn(
                'report_description',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Report Description'
            )
            ->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullabel' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Created timestamp'
            )->addIndex(
                $installer->getIdxName(
                    'rutavity_reports',
                    ['role_id']
                ),
                ['role_id']
            )->addIndex(
                $installer->getIdxName(
                    'rutavity_reports',
                    ['report_name']
                ),
                ['report_name']
            )->addForeignKey(
            $installer->getFkName(
                'rutavity_reports',
                'role_id',
                'authorization_role',
                'role_id'
            ),
            'role_id',
            $installer->getTable('authorization_role'),
            'role_id',
            Table::ACTION_SET_NULL
            )->setComment('Tabla para ver los reportes de powerBI de los asesores');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();



    }
   
}
