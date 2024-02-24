<?php
namespace PowerBi\AddReport\Model;

class Reportes extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('PowerBi\AddReport\Model\ResourceModel\Reportes');
    }
}