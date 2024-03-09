<?php

namespace Milan\Asesor\Block;

use Milan\Asesor\Model\AsesoresFactory;

class Asesores extends \Magento\Framework\View\Element\Template
{
    private $asesoresFactory;

    public function __construct(
        AsesoresFactory $asesoresFactory,
        \Magento\Framework\View\Element\Template\Context $context)

    {
        parent::__construct($context);
        $this->asesoresFactory = $asesoresFactory;
    }

    public function getAsesores()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->asesoresFactory->create()->getCollection()
                        ->addFieldToFilter('role_id', $id);
        $asesores = array();
        $asesores = $collection->getData();
        return $asesores;


    }

}