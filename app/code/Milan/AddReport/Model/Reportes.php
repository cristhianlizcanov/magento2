<?php
namespace Milan\AddReport\Model;

/* La clase Reportes extiende de la clase \Magento\Framework\Model\AbstractModel y hereda
   su funcionalidad y propiedades, la clase Reportes actua como modelo en el módulo Magento,
   proporcionando métodos para trabajar con los datos del modelo. */
class Reportes extends \Magento\Framework\Model\AbstractModel
{
    /* La función constructora inicializa el modelo 'Milan\AddReport\Model\ResourceModel\Reportes' */
    protected function _construct()
    {
        $this->_init('Milan\AddReport\Model\ResourceModel\Reportes');
    }
}