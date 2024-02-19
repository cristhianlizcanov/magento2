<?php

namespace Prueba\PowerBi\Setup;

use Prueba\PowerBi\Model\Demo;
use Prueba\PowerBi\Model\DemoFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @ DemoFactory
     */
    private $demoFactory;

    public function __construct(DemoFactory $demoFactory)
    {
        $this->demoFactory = $demoFactory;
    }

    /**
     * [@inheritdoc]
     * @SuppressWargin(PHPMD.ExcessiveMethodLength
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $demoData = [
            'title' => 'Demo Tile',
            'creation_time' => '2023-11-05',
            "is_visible" => 1,
        ];

        $this->createDemo()->setData($demoData)->save();
    }

    public function createDemo()
    {
        return $this->demoFactory->create();
    }


}