<?php

namespace Prueba\Backend\Block;

use Magento\Framework\View\Element\Template;

class Newproducts extends Template
{
    public $productCollectionFactory;
    
    public function __construct(
        Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )

    {
        parent::__construct($context, $data);
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function getProducts()
    {
        $collection = $this->productCollectionFactory->create();

        $collection->addAttributeToSelect("*")
         ->setOrder('created_at')
         ->setPageSize(5);
         return $collection;
    }

}