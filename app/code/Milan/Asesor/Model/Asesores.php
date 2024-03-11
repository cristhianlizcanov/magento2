<?php
namespace Milan\Asesor\Model;

/* La clase Asesores extiende de la clase AbstractModel de Magento. Se utiliza para manejar los modelos
   de Asesores. */
class Asesores extends \Magento\Framework\Model\AbstractModel
{
    /* La función constructora se llama automaticamente al instanciar la clase. Inicializa el modelo de recursos
       de la clase Asesores. */
    protected function _construct()
    {
        $this->_init('Milan\Asesor\Model\ResourceModel\Asesores');
    }
}