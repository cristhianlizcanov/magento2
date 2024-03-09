<?php
namespace Milan\AddReport\Model;

class Reportes extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Milan\AddReport\Model\ResourceModel\Reportes');
    }
}