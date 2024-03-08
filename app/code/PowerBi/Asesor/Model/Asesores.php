<?php
namespace PowerBi\Asesor\Model;

class Asesores extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('PowerBi\Asesor\Model\ResourceModel\Asesores');
    }
}