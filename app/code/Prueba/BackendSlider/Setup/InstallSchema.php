<?php

namespace Prueba\BackendSlider\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
        * Create table 'foggyline_slider_slide'
        */
        $table = $installer->getConnection()->newTable($installer->getTable('bicicletasmilan_backendslider_slide')
            )->addColumn(
                'slide_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true,
                'nullable' => false, 'primary' => true],
                'Slide Id'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                [],
                'Title'
            )->setComment('Foggyline Slider Slide');

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}