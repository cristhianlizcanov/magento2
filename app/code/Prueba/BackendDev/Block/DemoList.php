<?php

namespace Prueba\BackendDev\Block;

use Magento\Framework\View\Element\Template;
use Prueba\BackendDev\Model\ResourceModel\Demo\Collection as DemoCollection;
use Magento\Store\Model\ScopeInterface;

class DemoList extends Template
{
    /**
     * collection
     * 
     * @var DemoCollection
     */
    protected $_demoCollection;

    protected $_demoColFactory;

    public function __construct(
            Template\Context $context,
            \Prueba\BackendDev\Model\ResourceModel\Demo\CollectionFactory $collectionFactory,
            array $data = [])
    {
        $this->_demoColFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return DemoCollection
     */
    public function getDemoItems()
    {
        if(null === $this->_demoCollection) {
            $this->_demoCollection = $this->_demoColFactory->create();
        }

        return $this->_demoCollection;
    }
}