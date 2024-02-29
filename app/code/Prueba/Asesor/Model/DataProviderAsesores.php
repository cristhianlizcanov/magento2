<?php

namespace Prueba\Asesor\Model;

use Prueba\Asesor\Model\ResourceModel\Asesores\CollectionFactory;

class DataProviderAsesores extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $asesoresFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $asesoresFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach($items as $_asesores){
            $this->loadedData[$_asesores->getId()] = $_asesores->getData();
        }
        return $this->loadedData;
    }
}