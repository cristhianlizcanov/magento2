<?php

namespace PowerBi\PowerBi\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(), '1.0.0', '<')){
            
            $connection = $setup->getConnection();
            $column = [
                'type' => Table::TYPE_SMALLINT,
                'length' => 6,
                'nullable' => false,
                'comment' => 'Is Visible',
                'default' => '1'
            ];

            $connection->addColumn($setup->getTable('prueba_backenddev'), 'is_visible', $column);
        }

        $setup->endSetup();
    }
}