<?php

namespace PowerBi\AddReport\Block;

use Magento\Framework\View\Element\Template;
use PowerBi\AddReport\Model\ResourceModel\Reportes\Collection as ReportesCollection;
use Magento\Store\Model\ScopeInterface;

class Reportes extends Template
{
    /**
     * collection
     * 
     * @var ReportesCollection
     */
    protected $_reportesCollection;

    protected $_reportesColFactory;

    public function __construct(
            Template\Context $context,
            \PowerBi\AddReport\Model\ResourceModel\Reportes\CollectionFactory $collectionFactory,
            array $data = [])
    {
        $this->_remoColFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return ReportesCollection
     */
    public function getDemoItems()
    {
        if(null === $this->_reportesCollection) {
            $this->_reportesCollection = $this->_remoColFactory->create();
        }

        return $this->_reportesCollection;
    }
}