<?php
namespace Prueba\Asesor\Model;

class Asesores extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Prueba\Asesor\Model\ResourceModel\Asesores');
    }
}