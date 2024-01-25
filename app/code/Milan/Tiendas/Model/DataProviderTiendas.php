<?php

namespace Milan\Tiendas\Model;

use Milan\Tiendas\Model\ResourceModel\Tiendas\CollectionFactory;

class DataProviderTiendas extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $tiendasFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $tiendasFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach($items as $_tiendas){
            $this->loadedData[$_tiendas->getId()] = $_tiendas->getData();
        }
        return $this->loadedData;
    }
}