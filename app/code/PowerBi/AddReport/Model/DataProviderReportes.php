<?php

namespace PowerBi\AddReport\Model;

use PowerBi\AddReport\Model\ResourceModel\Reportes\CollectionFactory;

class DataProviderReportes extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $reportesFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $reportesFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach($items as $_reportes){
            $this->loadedData[$_reportes->getId()] = $_reportes->getData();
        }
        return $this->loadedData;
    }
}