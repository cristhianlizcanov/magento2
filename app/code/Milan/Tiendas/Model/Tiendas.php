<?php
namespace Milan\Tiendas\Model;

class Tiendas extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Milan\Tiendas\Model\ResourceModel\Tiendas');
    }
}