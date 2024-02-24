<?php

namespace PowerBi\AddReport\Block;

use PowerBi\AddReport\Model\ReportesFactory;

class Reportes extends \Magento\Framework\View\Element\Template
{
    private $reportesFactory;

    public function __construct(
        ReportesFactory $reportesFactory,
        \Magento\Framework\View\Element\Template\Context $context)

    {
        parent::__construct($context);
        $this->reportesFactory = $reportesFactory;
    }

    public function getReportes()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->reportesFactory->create()->getCollection()
                        ->addFieldToFilter('report_id', $id);
        $reportes = array();
        $reportes = $collection->getData();
        return $reportes;


    }

}