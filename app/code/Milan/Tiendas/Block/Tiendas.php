<?php

namespace Milan\Tiendas\Block;

use Milan\Tiendas\Model\TiendasFactory;

class Tiendas extends \Magento\Framework\View\Element\Template
{
    private $tiendasFactory;

    public function __construct(
        TiendasFactory $tiendasFactory,
        \Magento\Framework\View\Element\Template\Context $context)

    {
        parent::__construct($context);
        $this->tiendasFactory = $tiendasFactory;
    }

    public function getTiendas()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->tiendasFactory->create()->getCollection()
                        ->addFieldToFilter('store_id', $id);
        $tiendas = array();
        $tiendas = $collection->getData();
        return $tiendas;


    }

}