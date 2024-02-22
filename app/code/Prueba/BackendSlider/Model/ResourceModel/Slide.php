<?php

namespace Prueba\BackendSlider\Model\ResourceModel;

/**
* Foggyline Slide resource
*/
class Slide extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
    *
    * @return void
    */
    protected function _construct()
    {
        /* _init($mainTable, $idFieldName) */
        $this->_init('bicicletasmilan_backendslider_slide', 'slide_id');
    }
}