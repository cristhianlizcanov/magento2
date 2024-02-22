<?php

namespace Prueba\BackendSlider\Model\ResourceModel\Slide;

/**
* Prueba BackendSlider collection
*/
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Define resource model and model
    *
    * @return void
    */
    protected function _construct()
    {
        /* _init($model, $resourceModel) */
        $this->_init('Prueba\BackendSlider\Model\Slide', 'Prueba\BackendSlider\Model\ResourceModel\Slide');
    }
}