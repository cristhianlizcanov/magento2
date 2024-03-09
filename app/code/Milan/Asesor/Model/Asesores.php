<?php
namespace Milan\Asesor\Model;

class Asesores extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Milan\Asesor\Model\ResourceModel\Asesores');
    }
}